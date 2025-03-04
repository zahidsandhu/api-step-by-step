<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserAuthController extends Controller
{
    public function login(Request $request){
        $req_email = $request->email;
        $req_password = $request->password;

        $user = User::where('email',$req_email)->first();

        if(!$user || !Hash::check($req_password,$user->password)){
            return [
                'success' => false,
                'result' => "user data not found",
            ];
        }
        $success['token'] = $user->createToken('MyApp')->plainTextToken;

        return [
            'success' => true,
            'result' => $success,
            "message" => 'user login successfully',
        ];


    }

    public function signUp(Request $request){
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;

        return [
            'success' => true,
            'result' => $success,
            "message" => 'user register successfully',
        ];
    }
}
