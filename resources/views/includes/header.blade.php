<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="/" class="navbar-brand">Mov-DB</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{url('/admin')}}">Admin-Panel</a>
                @if (! Auth::user())
                <a class="nav-item nav-link" href="{{url('/login')}}">Login</a>
                <a class="nav-item nav-link" href="{{url('/login')}}">Register</a>
                    @endif
            </div>
        </div>
        @if (Auth::user())
            <a class="nav-link nav-user-img" href="{{ url('/admin')}}">
                <i class="fas fa-user mr-2"></i>
            </a>
        @endif

    </nav>
</header>
