@extends('layouts.main')

@section('content')
<h1>Modifica i dati</h1>
@if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
    
@endif


<form action="{{route ('update', $article -> id)}} "  method="POST">

     @method("POST")
     @csrf

    {{-- <label for="price">Nuovo prezzo:</label>
    <input type="number" name="price" placeholder="add price" value="{{$article -> price}}">
    <input type="submit" value="Modifica"> --}}

    <label for="title">Titolo:</label><br>
   <input type="text" name="title" placeholder="add title" value="{{$article -> title}}"><br>
   <label for="price">Prezzo:</label><br>
   <input type="number" name="price" placeholder="add price" value="{{$article -> price}}"><br><br>
   <textarea name="description" cols="30" rows="5">{{$article -> description}}</textarea><br>
   <label for="category">Categoria:</label><br>
   <select name="category">
       @foreach ($categories as $category)
           <option value="{{$category -> id}}"
            
            @if ($category -> id == $article -> category -> id)
                selected
            @endif
            
            >{{$category -> name}}</option>
       @endforeach
   </select><br>
   <h4>Tags</h4>
   @foreach ($tags as $tag)
       <input type="checkbox" name="tags[]" value="{{$tag -> id}}"
       
       @foreach ($article -> tags as $articleTag)
           @if ($tag -> id == $articleTag -> id)
               checked
           @endif
       @endforeach
       
       > {{$tag -> name}} <br>
   @endforeach
   <input type="submit" value="Modifica">

</form>
@endsection