@extends('layouts.app')

@section("content")
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <form action={{url('/login')}} method="post">
        @method("POST")
        @CSRF
        <div>
            Username : <input type="text" name="username">
        </div>
        <div>
            Password : <input type="password" name="password">
        </div>

        <button type="submit">Login</button>
    </form>

@endsection
