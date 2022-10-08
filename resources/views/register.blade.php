@extends('layouts.login')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <body>
        <x-navbar user=''></x-navbar>
        <div >
            <section class="" style="background-color: #eee;">
                <div class="container ">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px;margin-top: 80px;">
                                <div class="card-body p-md-5" >

                                    <form action="{{route('authenticate.store')}}" method="post">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Novo cadastro</p>
                                            
                                            <!-- Esquerda -->
                                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtNome" name="name" class="form-control" required/>
                                                        <label class="form-label" for="form3Example1c">Nome </label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="email" id="edtEmail" name="email" class="form-control" required/>
                                                        <label class="form-label" for="form3Example3c">Email</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="date" id="edtNascimento" name="dt_nascimento" class="form-control" required/>
                                                        <label class="form-label" for="form3Example3c">Data de Nascimento</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="number" id="edtCEP" name="cep" class="form-control" required/>
                                                        <label class="form-label" for="form3Example4c">CEP</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="number" id="edtNumbero" name="number" class="form-control" required/>
                                                        <label class="form-label" >Número</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtBairro" name="district" class="form-control" required/>
                                                        <label class="form-label" >Bairro</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <select name="state" class="form-select" required>
                                                            <option value="SP">SP</option>
                                                            <option value="RJ">RJ</option>
                                                            <option value="SC">SC</option>
                                                            <option value="TO">TO</option>
                                                            <option value="RS">RS</option>
                                                            <option value="RO">RO</option>
                                                            <option value="RN">RN</option>
                                                            <option value="PI">PI</option>
                                                            <option value="PE">PE</option>
                                                            <option value="PR">PR</option>
                                                            <option value="PB">PB</option>
                                                            <option value="PA">PA</option>
                                                            <option value="PB">PB</option>
                                                            <option value="MG">MG</option>
                                                            <option value="MS">MS</option>
                                                            <option value="MT">MT</option>
                                                            <option value="MA">MA</option>
                                                            <option value="GO">GO</option>
                                                            <option value="ES">ES</option>
                                                            <option value="DF">DF</option>
                                                            <option value="CE">CE</option>
                                                            <option value="BA">BA</option>
                                                            <option value="AM">AM</option>
                                                            <option value="AP">AP</option>
                                                            <option value="AL">AL</option>
                                                            <option value="AC">AC</option>
                                                        </select>
                                                        <label class="form-label">Estado</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="password" id="edtSenha" name="password" class="form-control" required/>
                                                        <label class="form-label" >Senha</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Diretira -->
                                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <select id="tipoCadastro" name="type" class="form-select" aria-label="Default select example" required>
                                                            <option value="1">Pessoa Física</option>
                                                            <option value="2">Pessoa Jurídica</option>
                                                        </select>
                                    
                                                        <label class="form-label" for="form3Example1c">Defina o tipo do cadastro</label>
                                                    </div>              
                                                </div>

                                                <div id="divCpf" class="">
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="number" class="form-control" />
                                                            <label class="form-label" >CPF</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="divCnpj" class="back">
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="number" class="form-control" />
                                                            <label class="form-label">CNPJ</label>
                                                        </div>
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="number" class="form-control" />
                                                            <label class="form-label" >I.E</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="number" id="edtTelefone" name="telephone" class="form-control" required/>
                                                        <label class="form-label" for="form3Example4c">Telefone</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtEndereço" name="address" class="form-control" required/>
                                                        <label class="form-label" for="form3Example4c">Endereço</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtComplemento" name="complement" class="form-control"/>
                                                        <label class="form-label" >Complemento</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtCidade" name="city" class="form-control" required/>
                                                        <label class="form-label" >Cidade</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtApelido" name="view_name" class="form-control" required/>
                                                        <label class="form-label" >Apelido</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="password" id="edtPassword" name="password_confirm" class="form-control" required/>
                                                        <label class="form-label" >Confirmar Senha</label>
                                                    </div>
                                                </div>
                                            </div>
                        
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            @include('components.messages.message')
                                            <button type="submit" class="btn btn-primary btn-lg">Criar Conta</button>
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
    <script>
        var select = document.getElementById("tipoCadastro");
        select.addEventListener('change', function(){
            if (select.value=='2') {
                document.getElementById("divCpf").classList.add("back");
                document.getElementById("divCnpj").classList.remove("back");
            }else{
                document.getElementById("divCnpj").classList.add("back");
                document.getElementById("divCpf").classList.remove("back");
            }
        })
    </script>
@endsection