<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Roles;

class AuthController extends Controller
{
    public function register(Request $request) {

        $fields = $request->validate([
            'forename' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'forename' => $fields['forename'],
            'surname' => $fields['surname'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role_id' => 4,
        ]);

        $token = $user->createToken('token')->plainTextToken;

        //$role = Roles::where('id', $user->roles_id)->get('role_name')->first();
        //$user['role'] = $role->role_name;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function login(Request $request) {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string' 
        ]);

        $user = User::Where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'inloggegevens komen niet overeen'
            ], 401);
        }

        if ($user->role_id == 1) {
            $token = $user->createToken('token', ['owner', 'admin', 'employee'])->plainTextToken;
        }

        if ($user->role_id == 2) {
            $token = $user->createToken('token', ['admin', 'employee'])->plainTextToken;
        }

        if ($user->role_id == 3) {
            $token = $user->createToken('token', ['employee'])->plainTextToken;
        }

        if ($user->role_id == 4) {
            $token = $user->createToken('token', ['user'])->plainTextToken;
        }

        $role = Roles::where('id', $user->role_id)->get('role')->first();
        $user['role'] = $role->role;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);

    }

    
    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return response([
            'message'  => 'u bent uitgelogd'
        ], 200);
    }


    public function authToken(Request $request) {
        $user =  $request->user();

        $role = Roles::where('id', $user->role_id)->get('role')->first();
        $user['role'] = $role->role;

        return response([
            'user' => $user
        ], 200);
    }
}
