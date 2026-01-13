<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function store(Request $request)
    {
        $permissionExist = Permission::where('name', $request->name)->exists();
        if (!$permissionExist) {
            return Permission::create(['name' => $request->name]);
        } else {
            return response()->json([
                'message' => 'This permission already exist'
            ],409);
        }
    }

    public function index()
    {
        return Permission::all();
    }
}

