<nav class="navbar navbar-light navbar-expand-md fixed-top" style="background: rgb(208, 204, 204);border-bottom-color: rgb(33, 37, 41);">
    <div class="container-fluid">
        <img src="{{asset('img/receita.png')}}" style="width: 3%;margin-right: 20px;" />
        <div id="navcol-1" class="collapse navbar-collapse">
            @if(Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="{{route('home.')}}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Meus Dados</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Histórico</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="#">Lances</a><a class="dropdown-item" href="#">Compras</a></div>
                    </li>
                </ul>
            @endif
            @if(Auth::guest())
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{route('home.')}}">HOME</a></li>
                </ul>
                <a class="btn btn-outline-primary btn-sm ms-auto" type="button" href="{{route('register')}}" >CADASTRAR</a>
            @endif
            @if(Auth::check())
                <a class="btn btn-outline-danger btn-sm ms-auto" type="button" href="{{route('logout')}}" >SAIR</a>
            @endif
         
        </div>
    </div>
</nav>