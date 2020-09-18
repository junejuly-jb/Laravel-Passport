<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function register(Request $request){

        $phrase = '!@#$%^&*()_+';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);

        $token = $user->createToken($phrase)->accessToken;

        return response()->json([
            'message' => 'added successfully!',
            'token' => $token
        ], 200);
    }

    public function login(Request $request){

        $phrase = '!@#$%^&*()_+';

        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($creds)) {
            $token = auth()->user()->createToken($phrase);
            return response()->json([
                'message' => 'Logged in!'
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unathorized access'
            ], 401);
        }
    }
    public function info(){
        return response()->json([
            'user' => auth()->user()->id
        ], 200);
    }
}
