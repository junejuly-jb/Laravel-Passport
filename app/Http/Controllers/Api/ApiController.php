<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function register(Request $request){

        $phrase = '!@#$%^&*()_+';
        // $this->validate($request, [
        //     'name' => 'required|min:3',
        //     'email' => 'required|unique',
        //     'password' => 'required|min:6',
        // ]);

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
}
