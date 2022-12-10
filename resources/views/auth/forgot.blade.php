@extends('layouts.app')

@section('title', 'Восстановление пароля')

@section('content')
    <div class="container">
        <h1>Восстановление пароля</h1>

        <div>
            @include('inc.messages')
        </div>

        <form method="POST" action="{{ route("forgot_process") }}" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="text" id="exampleInputEmail1" class="form-control" placeholder="Email" />
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">
                    <a href="{{ route("login") }}">Вспомнил пароль</a>
                </button>
                <button type="submit" class="btn btn-primary">Восстановить</button>
            </div>

        </form>
    </div>
@endsection
