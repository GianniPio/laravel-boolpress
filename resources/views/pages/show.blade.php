@extends('layouts.main')

@section('content')

    <span><a href="{{route('posts')}}">Torna alla lista</a></span>
    <table>
        <tr>
            <th>Titolo</th>
            <th>Prezzo</th>
            <th>Date di pubblicazione</th>
            <th>Categoria</th>
            <th>Tag</th>
            <th>Descrizione</th>
            <th>Autore</th>
        </tr>

        <tr>
            <td>{{$article -> title}}</td>
            <td>{{$article -> price}}€</td>
            <td>{{$article -> created_at -> format('d/m/Y')}}</td>
            <td>{{$article -> category -> name}}</td>
            <td>
                @foreach ($article -> tags as $tag)
                    {{$tag -> name}}<br>
                @endforeach
            </td>
            <td>{{$article -> description}}</td>
            <td>{{$article -> author}}</td>
        </tr>
    </table>

    <a href="{{route('edit', $article -> id)}}">Modifica</a>
@endsection