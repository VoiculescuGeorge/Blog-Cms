<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/">Go to Blog</a>
                </li>
            </ul>

            @if(Auth::check())
                <div class="dropdown ml-auto">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->email }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
</header>