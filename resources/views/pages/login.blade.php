@extends('layouts.main')

@section('content')
    <h1>Login</h1>

    <form action="{{route('login')}}" method="POST">

        @method('POST')
        @csrf

        
        <label for="email">Email</label>
        <input type="text" name="email"><br>
        <label for="password">Password</label>
        <input type="password" name="password"><br>
        <input type="submit" value="Login">
        
    </form>
@endsection