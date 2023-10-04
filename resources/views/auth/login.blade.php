@extends('layouts.app')

@section("content")
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
