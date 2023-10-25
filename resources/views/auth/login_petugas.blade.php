@extends('layouts.app')

@section("content")

    @if(session("error"))
        <div class="alert alert-danger">{{session("error")}}</div>
    @endif

    <h1>Login Petugas</h1>
    <form action={{url('/petugas/login')}} method="post">
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
