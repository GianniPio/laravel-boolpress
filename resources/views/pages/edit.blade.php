@extends('layouts.main')

@section('content')
<h1>Modifica il prezzo</h1>
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

    <label for="price">Number of pages:</label>
    <input type="number" name="price" placeholder="add price" value="{{$article -> price}}">
    <input type="submit" value="Modifica">

</form>
@endsection