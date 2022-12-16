<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(Request $request){
        $validData = $this->validate($request, [
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);


        if (! Auth::attempt($validData)){
            return response([
                'data' => 'اطلاعات صحیح نیست',
                'status' => 'error',
            ],403);
        }
        //return 2;
        $user = auth()->user();
        $token = $user->createToken('Token Name')->token();
        return $token;

        return $token;
        return $token;
 
        return $token;
        return auth()->user()->createToken('Api Token For Test')->accessToken;
        return new \App\Http\Resources\v1\User(Auth::user());
    }

    public function register(Request $request){
        $validData = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => Hash::make($validData['password']),
//            'api_token' => Str::random(100),
        ]);

        $user->setRememberToken('Api');

        return new \App\Http\Resources\v1\User($user);
    }
}
