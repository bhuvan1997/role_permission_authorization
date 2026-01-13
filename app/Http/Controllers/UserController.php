<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function assignRoles(Request $request, User $user)
    {
        $request->validate([
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id'
        ]);

        $user->roles()->sync($request->role_ids);

        return response()->json([
            'message' => 'Roles assigned successfully',
        ]);
    }
}
