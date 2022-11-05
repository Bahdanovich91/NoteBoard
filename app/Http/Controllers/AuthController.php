<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth("web")->attempt($data)) {
            return redirect(route("notes"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
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

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route("index"));
    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }

    public function forgot(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string", "exists:users"],
        ]);

        $user = User::where(["email" => $data["email"]])->first();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->save();

        Mail::to($user)->send(new ForgotPassword($password));

        return redirect(route("login"))->with('success', 'Password sent');
    }
}
