<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Negozio shopping</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>

    @include('components.header')

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <main>

        @yield('content')

    </main>

    

    @include('components.footer')
    


    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>