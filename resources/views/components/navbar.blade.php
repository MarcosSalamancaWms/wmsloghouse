<header class="p-1">
    <nav class="navbar navbar-expand-sm navbar-{{ $color }} bg-{{ $color }} p-2" id="menu">
        <a class="navbar-brand font-weight-bold ml-3" href="/">{{ $nameApp }}</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item mr-3">
                    @auth
                        <a class="nav-link text-white font-weight-bold rounded px-3" style="background-color: #616161;"
                            href="{{ route('home') }}">Ir a Inicio</a>
                    @else
                        <a class="nav-link text-white font-weight-bold rounded px-3" style="background-color: #616161;"
                            href="{{ route('login') }}">Iniciar Sesión</a>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>
</header>
