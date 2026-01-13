<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $roleExist = Role::where('name', $request->name)->exists();
        if (!$roleExist) {
            return Role::create(['name' => $request->name]);
        } else {
            return response()->json([
                'message' => 'This role already exist'
            ], 409);
        }
    }

    public function index()
    {
        return Role::all();
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $request->validate([
            'permission_ids' => 'required|array',
            'permission_ids.*' => 'exists:permissions,id'
        ]);

        $role->permissions()->sync($request->permission_ids);

        return response()->json([
            'message' => 'Permissions assigned successfully',
            'role' => $role->load('permissions')
        ]);
    }
}
