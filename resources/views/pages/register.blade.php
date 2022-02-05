@extends('layouts.main')

@section('content')
    <h1>Registrati</h1>

    <form action="{{route('register')}}" method="POST">


        @method('POST')
        @csrf
    
            <label for="name">Name</label>
            <input type="text" name="name"><br>
            <label for="email">Email</label>
            <input type="text" name="email"><br>
            <label for="password">Password</label>
            <input type="password" name="password"><br>
            <label for="password_confirmation">Password Confirmed</label>
            <input type="password" name="password_confirmation"><br>
            <input type="submit" value="Register">
        
        </form>
@endsection