@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
@endsection

<x-navbar user='FULANO'></x-navbar>

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col">
                <section class="py-4 py-xl-5">
                    <div class="container h-100">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Procurando por algo?</h4>
                                <div class="input-group">
                                    <input class="form-control" id="edtValor" type="text" placeholder="você pode procurar pelo modelo do veiculo ou tipo do imovel">
                                    <button class="btn btn-primary" type="button" id="bntPesquisar">
                                        Pesquisar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="container" id="divContainer">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" id>
                <div class="col-xxl-3">
                    <div class="card">
                        <div class="card">
                            <div class="card-body border rounded-0">
                                <h6 class="text-center card-title">Data do Leilão</h6>
                                <h4 class="text-center text-muted card-subtitle mb-2">15/10/2022</h4>
                            </div>
                        </div><img class="card-img w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4">
                            <p class="text-primary card-text mb-0">processando...</p>
                            <h4 class="card-title">processando...</h4>
                            <h3 class="text-center">processando...</h3>
                            <div class="d-grid gap-2"><button class="btn btn-outline-success btn-sm" type="button">processando...</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card">
                        <div class="card">
                            <div class="card-body border rounded-0">
                                <h6 class="text-center card-title">Data do Leilão</h6>
                                <h4 class="text-center text-muted card-subtitle mb-2">15/10/2022</h4>
                            </div>
                        </div><img class="card-img w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4">
                            <p class="text-primary card-text mb-0">processando...</p>
                            <h4 class="card-title">processando...</h4>
                            <h3 class="text-center">processando...</h3>
                            <div class="d-grid gap-2"><button class="btn btn-outline-success btn-sm" type="button">processando...</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card">
                        <div class="card">
                            <div class="card-body border rounded-0">
                                <h6 class="text-center card-title">Data do Leilão</h6>
                                <h4 class="text-center text-muted card-subtitle mb-2">15/10/2022</h4>
                            </div>
                        </div><img class="card-img w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4">
                            <p class="text-primary card-text mb-0">processando...</p>
                            <h4 class="card-title">processando...</h4>
                            <h3 class="text-center">processando...</h3>
                            <div class="d-grid gap-2"><button class="btn btn-outline-success btn-sm" type="button">processando...</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card">
                        <div class="card">
                            <div class="card-body border rounded-0">
                                <h6 class="text-center card-title">Data do Leilão</h6>
                                <h4 class="text-center text-muted card-subtitle mb-2">15/10/2022</h4>
                            </div>
                        </div><img class="card-img w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                        <div class="card-body p-4">
                            <p class="text-primary card-text mb-0">processando...</p>
                            <h4 class="card-title">processando...</h4>
                            <h3 class="text-center">processando...</h3>
                            <div class="d-grid gap-2"><button class="btn btn-outline-success btn-sm" type="button">processando...</button></div>
                        </div>
                    </div>
                </div>
            </div>
            

        
        <div class="row">
            <div class="col d-xxl-flex justify-content-xxl-end" style="margin-top: 20px;"><button class="btn btn-primary d-xxl-flex" type="button">Carregar mais<svg xmlns="http://www.w3.org/2000/svg" viewBox="-64 0 512 512" width="1em" height="1em" fill="currentColor">
                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M313.6 392.3l-104 112c-9.5 10.23-25.69 10.23-35.19 0l-104-112c-6.484-6.984-8.219-17.17-4.406-25.92S78.45 352 88 352H160V80C160 71.19 152.8 64 144 64H32C14.33 64 0 49.69 0 32s14.33-32 32-32h112C188.1 0 224 35.88 224 80V352h72c9.547 0 18.19 5.656 22 14.41S320.1 385.3 313.6 392.3z"></path>
                    </svg></button></div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/loading.min.js') }}"></script> 
    <script src="{{ asset('js/moment-with-locales.js') }}"></script> 

    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});
        moment.locale('pt-br');

        $.ajax({
            url:"{{ route( 'item.' )}}",
            type:'post',
            datatype:'json',
            beforeSend : function(){
                $('body').loading({
                    message: 'Carregando, por favor aguarde...'
                });
            },
            success: function(response){
                console.log(response);
                loadCards(response)
            }
        }).done(function () {
            $('body').loading('stop');
        });
        
        const inputEle = document.getElementById('edtValor');
        inputEle.addEventListener('keyup', function(e){
            var key = e.which || e.keyCode;
            if (key == 13) { // codigo da tecla enter
                let value = $('#edtValor').val();
                $.ajax({
                url:"{{ route( 'item.search' )}}",
                type:'post',
                datatype:'json',
                data:{term:value},
                beforeSend : function(){
                    $('body').loading({
                        message: 'Procurando...'
                    });
                },
                success: function(response){
                    console.log(response);
                    loadCards(response)
                }
            }).done(function () {
                $('body').loading('stop');
            });
            }
        });
        

        $(document).on('click', '#bntPesquisar', function() {
            let value = $('#edtValor').val();
            
            $.ajax({
                url:"{{ route( 'item.search' )}}",
                type:'post',
                datatype:'json',
                data:{term:value},
                beforeSend : function(){
                    $('body').loading({
                        message: 'Procurando...'
                    });
                },
                success: function(response){
                    console.log(response);
                    loadCards(response)
                }
            }).done(function () {
                $('body').loading('stop');
            });
            
        });

        function loadCards(response) {
            for (let x = 0; x < 4; x++) {
                var divCards = "<div class='row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3'>";
                    for (let index = 0; index < response.length; index++) {
                        let vl = parseFloat(response[index]['value_bid']).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
                        let dt = moment(response[index]['auction_date']).format('DD/MM/YYYY - h:mm' )

                        //let dt =  response[index]['auction_date'].replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1');
                        divCards += "<div class='col-xxl-3'><div class='card'><div class='card'><div class='card-body border rounded-0'><h6 class='text-center card-title'>DATA DO LEILÃO</h6><h4 class='text-center text-muted card-subtitle mb-2'>"+dt+"</h4></div></div><img class='card-img w-100 d-block fit-cover' style='height: 200px;' src='https://cdn.bootstrapstudio.io/placeholders/1400x800.png'><div class='card-body p-4'><p class='text-primary card-text mb-0'>"+response[index]['category']+"</p><h4 class='card-title'>"+response[index]['type']+"</h4><h3 class='text-center'>"+vl+"</h3><div class='d-grid gap-2'><button class='btn btn-outline-success btn-sm' type='button'>Aberto para lances</button></div></div></div></div>"
                    }
                divCards +=  "</br>"
            }
            $("#divContainer").html(divCards);
        }
    </script>
@endsection