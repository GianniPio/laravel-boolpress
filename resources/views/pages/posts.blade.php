@extends('layouts.main')

@section('content')
    <h1>Benvenuto {{Auth::user() -> name}}</h1>
    <h4>Questa è la tua lista degli articoli da te pubblicati</h4>
    <a href="{{route('create')}}">Aggiungi articolo</a>

    <ul>
        @foreach ($articles as $article)
            <li><a href="{{route('article', $article -> id)}}">{{$article -> title}}</a> - 
                <a href="{{route('delete', $article -> id)}}"><i class="fas fa-trash"></i></a>
            </li>
         @endforeach
    </ul>
    

    
        
   
@endsection