<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    /**
     * Show request link form.
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send reset link.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(60);

        // Delete old tokens for the email
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Insert new token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => Hash('sha256', $token),
            'created_at' => Carbon::now()
        ]);

        $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $request->email]));

        // Log token reset link for offline development ease
        Log::info("Password Reset Link for {$request->email}: {$resetUrl}");

        // Try sending mail, or log it
        try {
            Mail::send([], [], function ($message) use ($request, $resetUrl) {
                $message->to($request->email)
                    ->subject('Reset Password Notification')
                    ->html('<h3>Reset Password</h3><p>Click the link below to reset your password:</p><a href="'.$resetUrl.'">Reset Password</a>');
            });
        } catch (\Exception $e) {
            Log::error("Failed to send password reset email: " . $e->getMessage());
        }

        return back()->with('status', 'We have emailed your password reset link! (Or check the system logs).');
    }
}
