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
                            <div class="card text-black" style="border-radius: 25px;margin-top: 15px">
                                <div class="card-body p-md-5"">

                                    <form action="" method="post">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Cadastrar Leilão</p>
                                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
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
                                                        <input type="datetime" name="auction_date" class="form-control" required/>
                                                        <label class="form-label" for="form3Example3c">Data do evento</label>
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
                                                        <textarea class="form-control" name="note" rows="4"></textarea>
                                                        <label class="form-label">Observação</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            @include('components.messages.message')
                                            <button type="submit" class="btn btn-primary btn-lg">Criar Leilão</button>
                                        </div>
                                    </form>
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