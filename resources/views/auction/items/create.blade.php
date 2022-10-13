@extends('layouts.login')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')
    <body>
        <x-navbar user='FULANO'></x-navbar>
        <div >
            <section class="" style="background-color: #eee;">
                <div class="container " >
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-12 col-xl-11">
                            <!-- cadastro item -->
                            <div class="card text-black" style="border-radius: 25px;margin-top: 15px">
                                <div class="card-body p-md-5"">

                                    <div class="row justify-content-center">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Cadastrar Item para Leilão</p>

                                        <div class="col">
                                            <div>
                                                <ul class="nav nav-pills nav-fill" role="tablist">
                                                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="pill" href="#tab-1">Veículo</a></li>
                                                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-2">Imóvel</a></li>
                                                </ul>
                                                <div class="tab-content" >
                                                    <div id="tab-1" class="tab-pane fade show active" role="tabpanel">
                                                        <div class="row justify-content-center" >
                                                            <div class="col-6" style="margin-top: 25px;">
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectMarca" class="form-select" required>
                                                                            @for ($i = 0; $i < sizeof($brands->data); $i++)
                                                                                <option value="{{$brands->data[$i]->id}}">{{$brands->data[$i]->brand}}</option>
                                                                            @endfor
                                                                        </select>
                                                                        <label class="form-label">Marca</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectModelo" class="form-select" required>
                                                                            @for ($i = 0; $i < sizeof($carModels->data); $i++)
                                                                                <option value="{{$carModels->data[$i]->id}}">{{$carModels->data[$i]->model_car}}</option>
                                                                            @endfor
                                                                        </select>
                                                                        <label class="form-label">Modelo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectTipoVeiculo" class="form-select" required>
                                                                            @for ($i = 0; $i < sizeof($carTypes->data); $i++)
                                                                                <option value="{{$carTypes->data[$i]->id}}">{{$carTypes->data[$i]->type}}</option>
                                                                            @endfor
                                                                        </select>
                                                                        <label class="form-label">Tipo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input id="edtPlaca" type="text" name="license_plate" class="form-control"/>
                                                                        <label class="form-label" for="form3Example1c">Placa</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input id="edtkilometragem" type="text" name="mileage" class="form-control"/>
                                                                        <label class="form-label" for="form3Example1c">Kilometragem</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectGas" name="gas_kit" class="form-select" required>
                                                                            <option value="T">Sim</option>
                                                                            <option value="F">Não</option>
                                                                        </select>
                                                                        <label class="form-label">Gás Kit</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectDirecao" name="" class="form-select" required>
                                                                            <option value="MANUAL">Manual</option>
                                                                            <option value="AUTOMATICA">Automatica</option>
                                                                        </select>
                                                                        <label class="form-label">Direção</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6" style="margin-top: 25px;">
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectModeloTipo" class="form-select" required>
                                                                            @for ($i = 0; $i < sizeof($modelo->data); $i++)
                                                                                <option value="{{trim($modelo->data[$i]->id)}}">{{$modelo->data[$i]->model}}</option>
                                                                            @endfor
                                                                        </select>
                                                                        <label class="form-label">Estilo</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectBlindagem" name="shielding" class="form-select" required>
                                                                            <option value="F">Não</option>
                                                                            <option value="T">Sim</option>
                                                                        </select>
                                                                        <label class="form-label">Blindagem</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input id="edtCor" type="text" name="color" class="form-control"/>
                                                                        <label class="form-label" for="form3Example1c">cor</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectCombustivel" name="shielding" class="form-select" required>
                                                                            <option value="GASOLINA">Gasolina</option>
                                                                            <option value="ALCOOL">Alcool</option>
                                                                            <option value="DISEL">Disel</option>
                                                                            <option value="ELETRICO">Eletrico</option>
                                                                        </select>
                                                                        <label class="form-label">Combustivel</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectChassi" name="chassi_status" class="form-select" required>
                                                                            <option value="INTACTO">Perfeita condição</option>
                                                                            <option value="ARRANHOES">Com arranhões</option>
                                                                            <option value="AMASSADO">Amassado</option>
                                                                            <option value="ESTRUTURAL">Estrutura Comprometida</option>
                                                                        </select>
                                                                        <label class="form-label">Estado do Chassi</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectCondicionado" name="air_conditioning" class="form-select" required>
                                                                            <option value="T">Sim</option>
                                                                            <option value="F">Não</option>
                                                                        </select>
                                                                        <label class="form-label">Ar Condicionado</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectLeilao" name="leilao" class="form-select" required>
                                                                            @for ($i = 0; $i < sizeof($auctions->data); $i++)
                                                                                @if ((trim($auctions->data[$i]->open)=='T') &&( $auctions->data[$i]->category=='VEÍCULOS'))
                                                                                    <option value="{{trim($auctions->data[$i]->lote)}}">Lote - {{$auctions->data[$i]->lote}} - {{$auctions->data[$i]->place}} - {{\Carbon\Carbon::parse($auctions->data[$i]->auction_date)->format('d/m/Y - H:m')}}</option>
                                                                                @endif
                                                                            @endfor
                                                                        </select>
                                                                        <label class="form-label">Vincular ao leião</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <input placeholder="Campo Não Opcional" id="edtObservacao" type="text" name="obs" class="form-control"/>
                                                                    <label class="form-label" for="form3Example1c">Observação</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6 d-grid gap-2">
                                                                    <a href="{{route('item.all')}}" type="button" class="btn btn-outline-dark" style="margin-right: 15px">voltar</a>
                                                                </div>
                                                                <div class="col-6 d-grid gap-2">
                                                                    <button type="button" id="bntVeiculo" class="btn btn-outline-success">Adicionar item</button>
                                                                </div>
                                                            </div>
                                                            <div id="divAlert" style="margin-top: 15px;"></div>
                                                        </div>
                                                    </div>
                                                    <div id="tab-2" class="tab-pane fade" role="tabpanel">
                                                        <div class="row justify-content-center" >
                                                            <div class="col-6" style="margin-top: 25px;">
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select id="selectTipoImovel" class="form-select" required>
                                                                            @for ($i = 0; $i < sizeof($immobileTypes->data); $i++)
                                                                                <option value="{{$immobileTypes->data[$i]->id}}">{{$immobileTypes->data[$i]->type}}</option>
                                                                            @endfor
                                                                        </select>
                                                                        <label class="form-label">Tipo do imovel</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input type="text"  name="district" class="form-control" />
                                                                        <label class="form-label">Bairro</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6"style="margin-top: 25px;">
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input id="edtCidade" type="text" name="cidade" class="form-control" />
                                                                        <label class="form-label">Cidade</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input id="edtCep" type="text" name="cep" class="form-control" />
                                                                        <label class="form-label">CEP</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <input type="text"  name="address" class="form-control" />
                                                                    <label class="form-label">Endereço</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <textarea class="form-control" name="note" rows="3"></textarea>
                                                                        <label class="form-label" for="form3Example1c">Observação</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" id="bntImovel" class="btn btn-outline-success">Cadastrar Imóvel</button>
                                                            <div id="divAlerta"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/loading.min.js') }}"></script> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

<script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{session()->get('token_api')}}';

            $(document).on('click', '#bntVeiculo', function() {
                var marca = $('#selectMarca').val();
                var modelo = $('#selectModelo').val();
                var tipo = $('#selectTipoVeiculo').val();
                var placa = $('#edtPlaca').val();
                var kilometragem = $('#edtkilometragem').val();
                var gas = $('#selectGas').val();
                var direcao = $('#selectDirecao').val();
                var blindagem = $('#selectBlindagem').val();
                var cor = $('#edtCor').val();
                var combustivel = $('#selectCombustivel').val();
                var chassi = $('#selectChassi').val();
                var condicionado = $('#selectCondicionado').val();
                var obs = $('#edtObservacao').val();
                var leilao = $('#selectLeilao').val();
                var estilo = $('#selectModeloTipo').val();
                
                if ( condicionado=='' || chassi=='' || marca=='' || modelo=='' || tipo=='' || placa=='' || kilometragem=='' || gas=='' || direcao=='' || blindagem=='' || cor=='' || combustivel=='' ) {
                    $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Um ou mais campos obrigatórios não foram preenchidos!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                }else{
                    if (leilao>0) {
                        $.ajax({
                            url:"http://localhost:8000/api/vehicle",
                            headers: {
                            "Authorization": "Bearer "+token 
                            },
                            type:'post',
                            datatype:'json',
                            data:{ 
                                brand_id:marca,
                                car_model_id:modelo,
                                vehicles_model_id:estilo,
                                vehicle_type_id:tipo,
                                license_plate:placa,
                                mileage:kilometragem,
                                direction:direcao,
                                shielding:blindagem,
                                color:cor,
                                fuel:combustivel,
                                chassi_status:chassi,
                                air_conditioning:condicionado,
                                gas_kit:gas,
                                observation:obs,
                                auction_id:leilao,
                            },
                            beforeSend : function(){
                                $('body').loading({
                                    message: 'Adicionando item...'
                                });
                            },
                            success: function(response){
                                console.log(response)
                                $('body').loading('stop');
                                $('#divAlert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>✔</strong>Item ao leilão com sucesso.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
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
                    }else{
                        $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>ATENÇÃO!</strong> NÃO HÁ NENHUM LEILÃO VÁLIDO!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                    }
                }

            });
        });
</script>
@endsection