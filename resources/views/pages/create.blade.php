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

   <label for="title">Title:</label><br>
   <input type="text" name="title" placeholder="add title"><br>
   <label for="price">Prezzo</label><br>
   <input type="number" name="price" placeholder="add price"><br><br>
   <textarea name="description"></textarea><br>
   <label for="category">Categoria</label><br>
   <select name="category">
       @foreach ($categories as $category)
           <option value="{{$category -> id}}">{{$category -> name}}</option>
       @endforeach
   </select><br>
   <h4>Tags</h4>
   @foreach ($tags as $tag)
       <input type="checkbox" name="tags[]" value="{{$tag -> id}}"> {{$tag -> name}} <br>
   @endforeach
   <input type="submit" value="Create">

</form>
@endsection