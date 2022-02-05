<header>
    <h1>Boolpress</h1>

    
    <div class="link_access">

        @guest
                <a href="{{route('homeLogin')}}">Login</a> | 
                <a href="{{route('homeRegister')}}">Register</a><br>
            @else
            {{Auth::user() -> name}} |
                <a href="{{route('logout')}}">Logout</a>
        @endguest

    </div>
    
</header>