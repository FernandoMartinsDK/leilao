<nav class="navbar navbar-light navbar-expand-md fixed-top" style="background: rgb(208, 204, 204);border-bottom-color: rgb(33, 37, 41);">
    <div class="container-fluid">
        <img src="{{asset('img/receita.png')}}" style="width: 3%;margin-right: 20px;" />
        <div id="navcol-1" class="collapse navbar-collapse">
            @if(Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="{{route('home.')}}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('user.show',['id'=> session()->get('id') ])}}">Meus Dados</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Histórico</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('bid.historic',[ 'id' => session()->get('id') ])}}">Lances</a>
                            <a class="dropdown-item" href="#">Compras</a>
                        </div>
                    </li>
                    @if (session()->get('id')=='1')
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Administrar</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('item.all')}}">Items</a>
                                <a class="dropdown-item" href="{{route('auction.place')}}">Locais</a>
                                <a class="dropdown-item" href="{{route('auction.index')}}">Leilões</a>
                                <a class="dropdown-item" href="{{route('auction.institutions')}}">Instituições Financeiras</a>
                            </div>
                        </li>
                    @endif
                </ul>
            @endif
            @if(Auth::guest())
                <a class="btn btn-outline-primary btn-sm ms-auto" type="button" href="{{route('register')}}">CADASTRAR</a>
            @endif
            @if(Auth::check())
                <a class="btn btn-outline-danger btn-sm ms-auto" type="button" href="{{route('logout')}}"> SAIR</a>
            @endif
        </div>
    </div>
</nav>
