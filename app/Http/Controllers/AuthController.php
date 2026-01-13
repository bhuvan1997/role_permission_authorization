<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        return response()->json([
            'token' => $user->createToken('api-token')->plainTextToken
        ]);
    }
}
