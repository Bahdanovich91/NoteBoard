@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <h1>Note</h1>

    <div>
        @include('inc.messages')
    </div>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group mt-4">
            <label for="email">Your name</label>
            <input id="email" name="email" type="text"placeholder="Email" />
        </div>
        <div class="form-group mt-4">
            <label for="password">Description</label>
            <input id="password" name="password" type="password" placeholder="Пароль" />
        </div>

        <div>
            <a href="#">Забыли пароль?</a>
        </div>

        <div>
            <a href="{{ route("register") }}">Регистрация</a>
        </div>

        <button type="submit">Войти</button>
    </form>
@endsection
