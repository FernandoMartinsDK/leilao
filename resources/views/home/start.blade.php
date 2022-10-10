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
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
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
                        divCards += "<div class='col-xxl-3'><div class='card'><div class='card'><div class='card-body border rounded-0'><h6 class='text-center card-title'>DATA DO LEILÃO</h6><h4 class='text-center text-muted card-subtitle mb-2'>"+dt+"</h4></div></div><img class='card-img w-100 d-block fit-cover' style='height: 200px;' src='https://cdn.bootstrapstudio.io/placeholders/1400x800.png'><div class='card-body p-4'><p class='text-primary card-text mb-0'>"+response[index]['category']+"</p><h4 class='card-title'>"+response[index]['type']+"</h4><h3 class='text-center'>"+vl+"</h3><div class='d-grid gap-2'><a class='btn btn-outline-success btn-sm item' href='item/show/"+response[index]['item_id']+"/"+response[index]['categories_id']+"' type='button' >Aberto para lances</a></div></div></div></div>"
                    }
                divCards +=  "</br>"
            }
            $("#divContainer").html(divCards);
        }
    </script>
@endsection