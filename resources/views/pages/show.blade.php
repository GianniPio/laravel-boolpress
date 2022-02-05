@extends('layouts.main')

@section('content')

    <span><a href="{{route('posts')}}">Torna alla lista</a></span>
    <h1>{{$article -> title}} ({{$article -> price}}€)</h1>
    <span>Pubblicato il {{$article -> dateOfRelease}}</span><br>
    <p>{{$article -> description}}</p>

    <a href="{{route('edit', $article -> id)}}">Fai un offerta</a>
@endsection