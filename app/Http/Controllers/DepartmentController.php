<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\DepartmentUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    /**
     * Display departments.
     */
    public function index()
    {
        $departments = Department::with(['users', 'assignedUsers'])->get();
        // Potential heads (TL, PM, Admin, HR)
        $potentialHeads = User::whereHas('roles', function($q) {
            $q->whereIn('name', ['Admin', 'Project Manager', 'Team Lead', 'HR']);
        })->get();

        return view('modules.departments.index', compact('departments', 'potentialHeads'));
    }

    /**
     * Store department.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments',
            'description' => 'nullable|string',
        ]);

        $department = Department::create($request->only('name', 'description'));

        return response()->json([
            'success' => true,
            'message' => 'Department created successfully.',
            'department' => $department
        ]);
    }

    /**
     * Update department.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('departments')->ignore($department->id)],
            'description' => 'nullable|string',
        ]);

        $department->update($request->only('name', 'description'));

        return response()->json([
            'success' => true,
            'message' => 'Department updated successfully.',
            'department' => $department
        ]);
    }

    /**
     * Delete department.
     */
    public function destroy(Department $department)
    {
        // Restrict delete if tickets exist
        if ($department->tickets()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete department. There are active support tickets linked to this department.'
            ], 400);
        }

        $department->delete();

        return response()->json([
            'success' => true,
            'message' => 'Department deleted successfully.'
        ]);
    }

    /**
     * Assign Head of Department.
     */
    public function assignHead(Request $request, Department $department)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_in_department' => 'nullable|string|max:255'
        ]);

        $user = User::find($request->user_id);

        // Remove previous head status in this department
        DepartmentUser::where('department_id', $department->id)->update(['is_head' => false]);

        // Upsert Department User pivot entry
        DepartmentUser::updateOrCreate(
            [
                'user_id' => $user->id,
                'department_id' => $department->id
            ],
            [
                'is_head' => true,
                'role_in_department' => $request->role_in_department ?? 'Department Head'
            ]
        );

        // Also update primary department of that user to be this department if not already set
        if ($user->department_id !== $department->id) {
            $user->department_id = $department->id;
            $user->save();
        }

        return response()->json([
            'success' => true,
            'message' => "Successfully assigned {$user->name} as Department Head."
        ]);
    }
}
