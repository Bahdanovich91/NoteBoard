@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')

    <div >
        <h1>Восстановление пароля</h1>

        <div>
            @include('inc.messages')
        </div>

        <form method="POST" action="{{ route("forgot_process") }}">
            @csrf

            <input name="email" type="text" placeholder="Email" />

            <div>
                <a href="{{ route("login") }}">Вспомнил пароль</a>
            </div>

            <button type="submit">Восстановить</button>
        </form>
    </div>

@endsection
