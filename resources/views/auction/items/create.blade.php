@extends('layouts.login')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
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
                                                                        <input type="text" name="license_plate" class="form-control"/>
                                                                        <label class="form-label" for="form3Example1c">Placa</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input type="text" name="mileage" class="form-control"/>
                                                                        <label class="form-label" for="form3Example1c">Kilometragem</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select name="gas_kit" class="form-select" required>
                                                                            <option value="T">Sim</option>
                                                                            <option value="F">Não</option>
                                                                        </select>
                                                                        <label class="form-label">Gás Kit</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6" style="margin-top: 25px;">
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select name="" class="form-select" required>
                                                                            <option value="MANUAL">Manual</option>
                                                                            <option value="AUTOMATICA">Automatica</option>
                                                                        </select>
                                                                        <label class="form-label">Direção</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select name="shielding" class="form-select" required>
                                                                            <option value="F">Não</option>
                                                                            <option value="T">Sim</option>
                                                                        </select>
                                                                        <label class="form-label">Blindagem</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <input type="text" name="color" class="form-control"/>
                                                                        <label class="form-label" for="form3Example1c">cor</label>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-row align-items-center mb-4">
                                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <select name="shielding" class="form-select" required>
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
                                                                        <select name="chassi_status" class="form-select" required>
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
                                                                        <select name="air_conditioning" class="form-select" required>
                                                                            <option value="T">Sim</option>
                                                                            <option value="F">Não</option>
                                                                        </select>
                                                                        <label class="form-label">Ar Condicionado</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" id="bntVeiculo" class="btn btn-outline-success">Cadastrar Veículo</button>
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

@endsection