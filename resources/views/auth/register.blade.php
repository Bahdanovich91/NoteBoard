@extends('layouts.app')

@section('title', 'Registration')

@section('content')

    @include('inc.header')

    <h1>Registration</h1>

    <div>
        @include('inc.messages')
    </div>

    <form action="{{ route("register_process") }}" method="POST" class="form-signin m-auto">
        @csrf
        <div class="form-floating">
            <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
            <label for="name">Your name</label>
        </div>
        <div class="form-floating">
            <input  id="email" name="email" type="text" class="form-control" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>

        <div class="form-floating">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div class="form-floating">
            <input id="password_confirmation" name="password_confirmation" class="form-control" type="password" placeholder="password_confirmation" />
            <label for="password_confirmation">Repeat password</label>
        </div>

        <div class="mt-2">
            <a href="{{ route("login") }}">Login</a>
        </div>

        <button type="submit"  class="w-100 btn btn-lg btn-primary mt-2">save</button>


    </form>
@endsection
