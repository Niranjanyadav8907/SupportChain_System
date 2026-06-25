<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    
    //===================================== Display a list of permissions. ================================
    
    public function index()
    {
        $permissions = Permission::all();
        return response()->json([
            'success' => true,
            'permissions' => $permissions
        ]);
    }
}
