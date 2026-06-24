<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $departments = Department::all();
        $roles = Role::all();
        $managers = User::whereHas('role', function($q) {
            $q->whereIn('name', ['Admin', 'Project Manager', 'Team Lead']);
        })->get();

        return view('auth.register', compact('departments', 'roles', 'managers'));
    }

    
     //============================  Handle registration.========================================
     
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'employee_id' => 'required|string|max:50|unique:users,employee_id',
            'password' => 'required|string|min:8|confirmed',
            'department_id' => 'required|exists:departments,id',
            //'role_id' => 'required|exists:roles,id',
            'reporting_to' => 'nullable|exists:users,id',
            'phone' => 'nullable|string|max:20',
        ]);

       $employeeRole = Role::where('name', 'Employee')->firstOrFail();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'role_id' => $employeeRole->id,
            'password' => Hash::make($request->password),
            'department_id' => $request->department_id,
            'reporting_to' => $request->reporting_to,
            'phone' => $request->phone,
            'status' => 'active',
        ]);

        $user->roles()->sync([$employeeRole->id]);


        // ============================Log registration ======================================
        ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'AUTH REGISTER',
            'description' => "New user {$user->name} registered with Employee ID {$request->employee_id}.",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
