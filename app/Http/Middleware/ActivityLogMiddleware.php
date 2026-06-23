<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;
use Symfony\Component\HttpFoundation\Response;

class ActivityLogMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // We only log mutating requests (POST, PUT, PATCH, DELETE)
        if (in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            $user = Auth::user();
            
            // Exclude sensitive inputs
            $properties = $request->except(['password', 'password_confirmation', '_token', '_method']);

            $path = $request->path();
            $method = $request->method();

            // Construct action name from path
            $segments = explode('/', $path);
            $primarySegment = $segments[0] ?? 'system';
            $action = strtoupper($method) . ' ' . ucwords(str_replace('-', ' ', $primarySegment));

            $description = "User performed {$method} request on '{$path}'";
            if ($user) {
                $description = "User {$user->name} ({$user->email}) performed {$method} request on '{$path}'";
            }

            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'description' => $description,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'properties' => $properties
            ]);
        }

        return $response;
    }
}
