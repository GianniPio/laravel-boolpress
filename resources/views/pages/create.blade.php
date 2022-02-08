@extends('layouts.main')

@section('content')
    <h1>Aggiungi nuovo articolo</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
       
   @endif

   <form action="{{route('store')}}"  method="POST">

    @method("POST")
    @csrf

   <label for="title">Title:</label>
   <input type="text" name="title" placeholder="add title"><br>
   <label for="price">Prezzo</label>
   <input type="number" name="price" placeholder="add price"><br>
   <textarea name="description"></textarea><br>
   <input type="submit" value="Create">

</form>
@endsection