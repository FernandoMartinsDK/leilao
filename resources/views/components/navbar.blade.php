<div>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
        <div class="container-fluid">
            <img class="d-none" src="{{asset('img/receita.png')}}">
            <img src="{{asset('img/receita.png')}}" style="width: 47px;margin-left: 0px;margin-right: 10px;">
            <a class="navbar-brand" href="#">Receita Federal - Leilões</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <a class="btn btn-outline-primary ms-auto" role="button" href="{{route('authenticate.register')}}">Registrar</a>
                <a class="btn btn-primary" type="button" href="{{route('authenticate.login')}}" style="margin-left: 15px;">Logar</a>
                <!-- <a class="btn btn-primary" type="button"style="margin-left: 15px;">{{$user}}</a> -->
            </div>
        </div>
    </nav>
</div>