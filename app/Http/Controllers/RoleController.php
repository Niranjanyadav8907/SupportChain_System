<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    
    // ============================ Display roles and permissions.=============================
    
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('modules.roles.index', compact('roles', 'permissions'));
    }

    
    // =================================== Store role.========================================
     
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::create($request->only('name', 'description'));

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully.',
            'role' => $role->load('permissions')
        ]);
    }

    
    //============================== Update role.========================================
     
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($role->id)],
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

       
        $protectedRoles = ['Admin', 'Team Lead', 'Project Manager', 'HR', 'Employee'];
        if (in_array($role->name, $protectedRoles) && $role->name !== $request->name) {
            return response()->json([
                'success' => false,
                'message' => 'Standard system roles cannot be renamed.'
            ], 403);
        }

        $role->update($request->only('name', 'description'));
        $role->permissions()->sync($request->permissions ?? []);

        return response()->json([
            'success' => true,
            'message' => 'Role and permissions updated successfully.',
            'role' => $role->load('permissions')
        ]);
    }

    
     //=================================== Delete role. ====================================
     
    public function destroy(Role $role)
    {
        $protectedRoles = ['Admin', 'Team Lead', 'Project Manager', 'HR', 'Employee'];
        if (in_array($role->name, $protectedRoles)) {
            return response()->json([
                'success' => false,
                'message' => 'Standard system roles cannot be deleted.'
            ], 403);
        }

        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully.'
        ]);
    }
}
