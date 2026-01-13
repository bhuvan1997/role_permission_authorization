<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class AuthorizationController extends Controller
{
    public function authorizeUser(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->token);

        if (!$token) {
            return response()->json(['authorized' => false]);
        }

        $user = $token->tokenable;

        $permissions = $user->roles()
            ->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique();

        return response()->json([
            'authorized' => $permissions->contains($request->permission)
        ]);
    }
}
