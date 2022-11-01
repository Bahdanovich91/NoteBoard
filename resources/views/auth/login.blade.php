@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <h1>Note</h1>

    <div>
        @include('inc.messages')
    </div>

    <form action="{{ route('store') }}" method="POST" class="form-signin w-100 m-auto">
        @csrf
        <div class="form-floating">
            <input  id="email" name="email" type="text" class="form-control" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div>
            <a href="#">Забыли пароль?</a>
        </div>

        <div>
            <a href="{{ route("register") }}">Регистрация</a>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
@endsection
