<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['department', 'roles', 'manager'])->get();
        $roles = Role::all();
        $departments = Department::all();
        $managers = User::whereHas('roles', function($q) {
            $q->whereIn('name', ['Admin', 'Project Manager', 'Team Lead']);
        })->get();

        return view('modules.users.index', compact('users', 'roles', 'departments', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'department_id' => 'required|exists:departments,id',
            'reporting_to' => 'nullable|exists:users,id',
            'phone' => 'nullable|string|max:20',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department_id' => $request->department_id,
            'reporting_to' => $request->reporting_to,
            'phone' => $request->phone,
            'status' => 'active'
        ]);

        $user->roles()->sync($request->roles);

        \App\Models\Hierarchy::updateOrCreate(
            ['user_id' => $user->id],
            [
                'reporting_to' => $request->reporting_to,
                'level' => $user->roles()->first()?->name ?? 'Employee',
                'depth' => $request->reporting_to ? (\App\Models\Hierarchy::where('user_id', $request->reporting_to)->first()?->depth ?? 0) + 1 : 0
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.',
            'user' => $user->load('department', 'roles')
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8',
            'department_id' => 'required|exists:departments,id',
            'reporting_to' => 'nullable|exists:users,id',
            'phone' => 'nullable|string|max:20',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
            'status' => 'required|in:active,inactive',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'reporting_to' => $request->reporting_to,
            'phone' => $request->phone,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->roles()->sync($request->roles);

        \App\Models\Hierarchy::updateOrCreate(
            ['user_id' => $user->id],
            [
                'reporting_to' => $request->reporting_to,
                'level' => $user->roles()->first()?->name ?? 'Employee',
                'depth' => $request->reporting_to ? (\App\Models\Hierarchy::where('user_id', $request->reporting_to)->first()?->depth ?? 0) + 1 : 0
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully.',
            'user' => $user->load('department', 'roles')
        ]);
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot delete your own account.'
            ], 403);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.'
        ]);
    }
}
