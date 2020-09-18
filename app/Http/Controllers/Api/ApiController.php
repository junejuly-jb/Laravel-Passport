<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;

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
                'message' => 'Logged in!',
                'token' => $token
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unathorized access'
            ], 401);
        }
    }
    public function info(){
        return response()->json([
            'user' => auth()->user()
        ], 200);
    }

    public function addTodo(Request $request){

        if(auth()->user()){
            $todo = Todo::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title
            ]);
            return response()->json([
                'Message' => 'Added successfully!'
            ], 200);
        }
        else{
            return response()->json([
                'error' => 'Unathorized'
            ], 401);
        }
    }

    public function todoDetails($id){
        if(auth()->user()){
            $todo = Todo::find($id);
            if($todo->user_id != Auth()->user()->id){
                return response()->json([
                    'error' => 'This todo doesnt belong to you'
                ], 401); 
            }
            else{
                return response()->json([
                    'data' => $todo
                ], 200);
            }
        }
        else{
            return response()->json([
                'error' => 'Unathorized'
            ], 401);
        }
    }
}
