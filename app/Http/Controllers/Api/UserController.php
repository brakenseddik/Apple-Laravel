<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if($user->save()){
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return response(['result' => true, 'user' => Auth::user()]);
            }
        }
        return response(['result' => false, 'user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return response(['result' => true, 'user' => Auth::user()]);
        }
        return response(['result' => false, 'user' => new User()]);
    }
}
