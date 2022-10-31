<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("login"));
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => bcrypt($request->input('password'))
        ]);
//        $user = new User();
//
//        $user->name = $request->input('name');
//        $user->email = $request->input('email');
//        $user->password = $request->input('password');
//
//        $user->save();

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route("note"));
    }
}
