@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

<x-navbar user='FULANO'></x-navbar>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <section class="py-4 py-xl-5">
                    <div class="container h-100">
                        <br>
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">@if($new==true) Novo Estabelecimento @else Atualizar Estabelecimento @endif </p>
                        <div class="container h-100">
                            <div class="card" style="margin-top: 60px">
                                <div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="country" value="Brasil">
                                        <input type="hidden" name="id" id="edtId" @if($value != false) value="{{$value->data->id}}" @endif>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" >Nome do Local*</span>
                                                <input name="name" id="edtNome" type="text" class="form-control" placeholder="Local do evento" @if($value != false) value="{{$value->data->name}}" @endif>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Cidade*</span>
                                                <input name="city" id="edtCidade" type="text" class="form-control" placeholder="Nome da cidade" @if($value != false) value="{{$value->data->city}}" @endif>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Complemento</span>
                                                <input name="complement" id="edtComplemento" type="text" class="form-control" placeholder="Informação adicional" @if($value != false) value="{{$value->data->complement}}" @endif>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <a href="{{route('auction.place')}}" type="button" class="btn btn-outline-dark "><i class="fa-solid fa-left-long"></i> Voltar</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" >Bairro*</span>
                                                <input name="district" id="edtBairro" type="text" class="form-control" placeholder="Nome do Bairro" @if($value != false) value="{{$value->data->district}}" @endif>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" >Endereço*</span>
                                                <input name="address" id="edtEndereco" type="text" class="form-control" placeholder="Endereço do local" @if($value != false) value="{{$value->data->address}}" @endif>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" >C.E.P*</span>
                                                <input name="cep" id="edtCep" type="text" class="form-control" placeholder="Código Postal" @if($value != false) value="{{$value->data->cep}}" @endif>
                                            </div>
                                            <div class="d-grid gap-2">
                                                @if ($new==true)
                                                    <button id="bntCriar" type="button" class="btn btn-outline-success "><i class="fa-regular fa-floppy-disk"></i> Criar Local</button>
                                                @else
                                                    <button id="bntAtualizar" type="button" class="btn btn-outline-primary "><i class="fa-regular fa-floppy-disk"></i> Atualizar Local</button>
                                                @endif
                                            </div>
                                        </div>
                                        <div id="divAlert" style="margin-top: 10px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/loading.min.js') }}"></script> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script>
        $(document).ready(function(){
                
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{session()->get('token_api')}}';
            var api = '{{env('APP_API')}}'

            $(document).on('click', '#bntCriar', function() {
                var nome = $("#edtNome").val();
                var cidade =  $("#edtCidade").val();
                var complemento = $("#edtComplemento").val();
                var bairro = $("#edtBairro").val();
                var cep = $("#edtCep").val();
                var endereco = $("#edtEndereco").val();

                if (nome=='' || cidade=='' || bairro=='' || cep=='' || endereco=='') {
                    $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Um ou mais campos obrigatórios não foram preenchidos!.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                }else{
                    $.ajax({
                        url:api+"place/",
                        headers: {
                        "Authorization": "Bearer "+token 
                        },
                        type:'post',
                        datatype:'json',
                        data:{name:nome, city:cidade, complement:complemento, district:bairro, cep:cep, address:endereco},                    
                        beforeSend : function(){
                            $('body').loading({
                                message: 'Adicionando Local...'
                            });
                        },
                        success: function(response){
                            $('body').loading('stop');
                            $('#divAlert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>✔</strong> Local adicionado com sucesso.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                        },
                        error: function (request, status, error) {
                            $('body').loading('stop');
                            if ('Unauthorized'==error) {
                                alert('Sessão expirada');
                                window.location.href = "{{route('logout')}}";
                            }else{
                                alert('Um erro aconteceu: '+error)
                            }
                            $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Um erro interno aconteceu!.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                        }
                    }).done(function () {
                        $('body').loading('stop');
                    });
                }

            });

            $(document).on('click', '#bntAtualizar', function() {
                var nome = $("#edtNome").val();
                var cidade =  $("#edtCidade").val();
                var complemento = $("#edtComplemento").val();
                var bairro = $("#edtBairro").val();
                var cep = $("#edtCep").val();
                var endereco = $("#edtEndereco").val();
                var vid = $("#edtId").val();

                if (nome=='' || cidade=='' || bairro=='' || cep=='' || endereco=='') {
                    $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Um ou mais campos obrigatórios não foram preenchidos!.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                }else{
                    $.ajax({
                        url:api+"place/"+vid,
                        headers: {
                        "Authorization": "Bearer "+token 
                        },
                        type:'put',
                        datatype:'json',
                        data:{name:nome, city:cidade, complement:complemento, district:bairro, cep:cep, address:endereco, id:vid},                    
                        beforeSend : function(){
                            $('body').loading({
                                message: 'Atualizando Local...'
                            });
                        },
                        success: function(response){
                            $('body').loading('stop');
                            $('#divAlert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>✔</strong> Local atualizado com sucesso.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                        },
                        error: function (request, status, error) {
                            $('body').loading('stop');
                            if ('Unauthorized'==error) {
                                alert('Sessão expirada');
                                window.location.href = "{{route('logout')}}";
                            }else{
                                alert('Um erro aconteceu: '+error)
                            }
                            $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Um erro interno aconteceu!.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                        }
                    }).done(function () {
                        $('body').loading('stop');
                    });
                }

            });

        });
    </script>
@endsection