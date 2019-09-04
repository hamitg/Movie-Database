<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="/" class="navbar-brand">Mov-DB</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home</a>
                <a class="nav-item nav-link" href="#">Featured</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
            </div>
        </div>
        @if (Auth::user())
            <a class="nav-link nav-user-img" href="{{ url('/admin')}}">
                <i class="fas fa-user mr-2"></i>
            </a>
        @endif

    </nav>
</header>