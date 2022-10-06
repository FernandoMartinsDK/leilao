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
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Cadastrar Item de Leilão</p>

                                        <div class="col-6">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="categorie_id" class="form-select" required>
                                                        <option value="1">Imóvel</option>
                                                        <option value="2">Veiculo</option>
                                                    </select>
                                                    <label class="form-label">Categoria</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="categorie_id" class="form-select" required>
                                                        <option value="1">Noma A</option>
                                                        <option value="2">Nome B</option>
                                                    </select>
                                                    <label class="form-label">Local</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" name="note" class="form-control"/>
                                                    <label class="form-label" for="form3Example1c">Observação</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="" class="form-select" required>
                                                        <option value="1">Leilão A</option>
                                                        <option value="2">Laeilão B</option>
                                                    </select>
                                                    <label class="form-label">Leilão</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="financial_institution_id" class="form-select" required>
                                                        <option value="1">Noma A</option>
                                                        <option value="2">Nome B</option>
                                                    </select>
                                                    <label class="form-label">Orgão Financeiro</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="number" name="note" class="form-control"/>
                                                    <label class="form-label" for="form3Example1c">Lance Inicial</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- cadastro Veiculo -->
                            <div class="card text-black" style="border-radius: 25px;margin-top: 15px">
                                <div class="card-body p-md-5">

                                    <div class="row justify-content-center">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Informação do Veículo</p>

                                        <div class="col-6">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="!!!CRIAR_MIGRATION!!!" class="form-select" required>
                                                        <option value="1">Marca - A</option>
                                                        <option value="2">Marca - B</option>
                                                    </select>
                                                    <label class="form-label">Marca</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="!!!CRIAR_MIGRATION!!!" class="form-select" required>
                                                        <option value="1">Modelo - A</option>
                                                        <option value="2">Modelo - B</option>
                                                    </select>
                                                    <label class="form-label">Modelo</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="number" value="0" name="category_id" class="form-control" disabled/>
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
                                        <div class="col-6">
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
                                </div>
                            </div>

                            <!-- cadastro Imovel -->
                            <div class="card text-black" style="border-radius: 25px;margin-top: 15px">
                                <div class="card-body p-md-5"">
                                    <div class="row justify-content-center">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Informação do Imovel</p>

                                        <div class="col-6">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="immobile_type_id" class="form-select" required>
                                                        <option value="1">Casa</option>
                                                        <option value="2">Apartamento</option>
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

                                        <div class="col-6">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <select name="city" class="form-select" required>
                                                        <option value="1">Cidade A</option>
                                                        <option value="2">Cidade B</option>
                                                    </select>
                                                    <label class="form-label">Cidade</label>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="number" name="cep" class="form-control" />
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

                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 15px">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        @include('components.messages.message')
                                        <button type="submit" class="btn btn-primary btn-lg">Criar Leilão</button>
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