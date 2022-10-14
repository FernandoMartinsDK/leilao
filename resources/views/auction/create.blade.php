@extends('layouts.login')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <body>
        <x-navbar user='FULANO'></x-navbar>
        <div >
            <section class="" style="background-color: #eee;">
                <div class="container" >
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px;margin-top: 90px;">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Cadastrar Novo Leilão</p>
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select id="selectCategoria" name="categorie_id" class="form-select select2" required>
                                                        @for ($i = 0; $i < sizeOf($categories->data); $i++)
                                                            <option value="{{$categories->data[$i]->id}}">{{$categories->data[$i]->category}}</option>
                                                        @endfor
                                                    </select>
                                                    <label class="form-label">Categoria</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="date" id="edtEvento" name="auction_date" class="form-control" required/>
                                                    <label class="form-label" for="form3Example3c">Data do evento</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="time" id="edtHora"  class="form-control" required/>
                                                    <label class="form-label">Hora do evento</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select id="selectPlace" name="place_id" class="form-select select2" required>
                                                        @for ($i = 0; $i < sizeOf($places->data); $i++)
                                                            <option value="{{$places->data[$i]->id}}">{{$places->data[$i]->address}} - {{$places->data[$i]->district}} - {{$places->data[$i]->city}}</option>
                                                        @endfor
                                                    </select>
                                                    <label class="form-label">Local</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select id="selectFinanceiro" name="financial_institution_id" class="form-select select2" required>
                                                        @for ($i = 0; $i < sizeof($institutions->data); $i++)
                                                            <option value="{{$institutions->data[$i]->id}}">{{$institutions->data[$i]->name}}</option>
                                                        @endfor
                                                    </select>
                                                    <label class="form-label">Orgão Financeiro</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <textarea id="edtObs" class="form-control" name="note" rows="4"></textarea>
                                                    <label class="form-label">Observação</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        @include('components.messages.message')
                                        <a href="{{route('auction.index')}}" type="button" class="btn btn-outline-dark" style="margin-right: 15px">voltar</a>
                                        <button type="button" id="bntCriar"  class="btn btn-primary">Criar Leilão</button>
                                        <br>
                                    </div>
                                    <div id="divAlert"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </section>
        </div>

        @include('components.footer')
    </body>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/loading.min.js') }}"></script> 
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Pesquisar por...'
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{session()->get('token_api')}}';
            var api = '{{env('APP_API')}}';

            $(document).on('click', '#bntCriar', function() {
                var categoria = $('#selectCategoria').val();
                var lugar = $('#selectPlace').val();
                var financeiro = $('#selectFinanceiro').val();
                var data = $('#edtEvento').val();
                var obs = $('#edtObs').val();
                var hora = $('#edtHora').val();
                console.log(categoria+' - '+lugar+' - '+financeiro+' - '+data+' - '+obs)

                if (data=='' || hora=='') {
                    $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Um ou mais campos obrigatórios não foram preenchidos!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                }else{
                    $.ajax({
                    url:api+"auctions",
                    headers: {
                    "Authorization": "Bearer "+token 
                    },
                    type:'post',
                    datatype:'json',
                    data:{ auction_date:data, financial_institution_id:financeiro, place_id:lugar, categorie_id:categoria, note:obs, hour:hora },
                    beforeSend : function(){
                        $('body').loading({
                            message: 'Criando leilão...'
                        });
                    },
                    success: function(response){
                        $('body').loading('stop');
                        $('#divAlert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>✔</strong> Leilão adicionado com sucesso.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                    },
                    error: function (request, status, error) {
                        console.log(request, status, error)
                        $('body').loading('stop');
                        if ('Unauthorized'==error) {
                            alert('Sessão expirada');
                            window.location.href = "{{route('logout')}}";
                        }else{
                            $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Um erro interno aconteceu!.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                        }
                    }
                }).done(function () {
                    $('body').loading('stop');
                });
                }
                

            });

        });
    </script>
@endsection