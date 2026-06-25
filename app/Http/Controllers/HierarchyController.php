<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hierarchy;
use Illuminate\Http\Request;

class HierarchyController extends Controller
{
    
    //=================================== Display reporting structure.============================
    
    public function index()
    {
        $users = User::with(['manager', 'roles', 'department'])->get();
        // Fetch all managers
        $managers = User::whereHas('roles', function($q) {
            $q->whereIn('name', ['Admin', 'Project Manager', 'Team Lead']);
        })->get();

        // Build simple hierarchical tree structure of organization
        $rootNodes = User::whereNull('reporting_to')->with(['subordinates.subordinates'])->get();

        return view('modules.hierarchy.index', compact('users', 'managers', 'rootNodes'));
    }

    
     //===================================== Map user reporting manager. ============================
     
    public function updateManager(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reporting_to' => 'nullable|exists:users,id|different:user_id'
        ]);

        $user = User::find($request->user_id);
        $user->reporting_to = $request->reporting_to;
        $user->save();

        // Sync in hierarchies table
        $managerDepth = 0;
        if ($request->reporting_to) {
            $managerHierarchy = Hierarchy::where('user_id', $request->reporting_to)->first();
            $managerDepth = $managerHierarchy ? $managerHierarchy->depth + 1 : 1;
        }

        Hierarchy::updateOrCreate(
            ['user_id' => $user->id],
            [
                'reporting_to' => $request->reporting_to,
                'level' => $user->roles()->first()?->name ?? 'Employee',
                'depth' => $managerDepth
            ]
        );

        return response()->json([
            'success' => true,
            'message' => "Reporting manager updated successfully for {$user->name}."
        ]);
    }
}
