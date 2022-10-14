@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
@endsection

<x-navbar user='FULANO'></x-navbar>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <section class="py-4 py-xl-5">
                    <div class="container h-100">
                        <div class="card" style="margin-top: 60px">
                            <div class="card-body">

                                <div class="row justify-content-center">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Atualizar Cadastro</p>
                                    <input type="hidden" id="edtId" value="{{$value->data->id}}">
                                    <div>
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="pill" href="#tab-1">Dados Pessoais</a></li>
                                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-2">Endereço</a></li>
                                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" href="#tab-3">Acesso</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane fade show active" role="tabpanel">
                                                <br>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtNome" name="name" class="form-control" value="{{$value->data->name}}" required/>
                                                        <label class="form-label" for="form3Example1c">Nome* </label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="date" id="edtNascimento" name="dt_nascimento" class="form-control" value="{{$value->data->date_birth}}" required/>
                                                        <label class="form-label" for="form3Example3c">Data de Nascimento*</label>
                                                    </div>
                                                </div>
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
                                                            <input id="edtCpf" type="text" class="form-control" value="{{$value->data->cpf}}"/>
                                                            <label class="form-label" >CPF*</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="divCnpj" class="back">
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="text" id="edtCnpj" class="form-control" />
                                                            <label class="form-label">CNPJ*</label>
                                                        </div>
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="text" id="edtInscricaoEstadual" class="form-control" />
                                                            <label class="form-label">I.E*</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtTelefone" name="telephone" class="form-control" value="{{$value->data->telephone}}" required/>
                                                        <label class="form-label" for="form3Example4c">Telefone Celeular*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtApelido" name="view_name" class="form-control" value="{{$value->data->view_name}}" required/>
                                                        <label class="form-label" >Apelido*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="button" id="btnAtualizarDados" class="btn btn-primary btn-lg">Atualizar Dados Pessoais</button>
                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-pane fade" role="tabpanel">
                                                <br>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtEndereco" name="address" class="form-control" value="{{$address->data->address}}" required/>
                                                        <label class="form-label" for="form3Example4c">Endereço*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtComplemento" name="complement" class="form-control" value="{{$address->data->complement}}"/>
                                                        <label class="form-label">Complemento</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtCidade" name="city" class="form-control" value="{{$address->data->city}}" required/>
                                                        <label class="form-label" >Cidade*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtCep" name="cep" class="form-control" value="{{$address->data->cep}}" required/>
                                                        <label class="form-label" for="form3Example4c">CEP*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="number" id="edtNumero" name="number" class="form-control" value="{{$address->data->number}}" required/>
                                                        <label class="form-label" >Número*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtBairro" name="district" class="form-control" value="{{$address->data->district}}" required/>
                                                        <label class="form-label" >Bairro*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <select name="state" id="selectEstado" class="form-select" required>
                                                            <option value="SP" @if($address->data->state == 'SP') selected @endif>SP</option>
                                                            <option value="RJ">RJ @if($address->data->state == 'RJ') selected @endif</option>
                                                            <option value="SC">SC @if($address->data->state == 'SC') selected @endif</option>
                                                            <option value="TO">TO @if($address->data->state == 'TO') selected @endif</option>
                                                            <option value="RS">RS @if($address->data->state == 'RS') selected @endif</option>
                                                            <option value="RO">RO @if($address->data->state == 'RO') selected @endif</option>
                                                            <option value="RN">RN @if($address->data->state == 'RN') selected @endif</option>
                                                            <option value="PI">PI @if($address->data->state == 'PI') selected @endif</option>
                                                            <option value="PE">PE @if($address->data->state == 'PE') selected @endif</option>
                                                            <option value="PR">PR @if($address->data->state == 'PR') selected @endif</option>
                                                            <option value="PB">PB @if($address->data->state == 'PB') selected @endif</option>
                                                            <option value="PA">PA @if($address->data->state == 'PA') selected @endif</option>
                                                            <option value="PB">PB @if($address->data->state == 'PB') selected @endif</option>
                                                            <option value="MG">MG @if($address->data->state == 'MG') selected @endif</option>
                                                            <option value="MS">MS @if($address->data->state == 'MS') selected @endif</option>
                                                            <option value="MT">MT @if($address->data->state == 'MT') selected @endif</option>
                                                            <option value="MA">MA @if($address->data->state == 'MA') selected @endif</option>
                                                            <option value="GO">GO @if($address->data->state == 'GO') selected @endif</option>
                                                            <option value="ES">ES @if($address->data->state == 'ES') selected @endif</option>
                                                            <option value="DF">DF @if($address->data->state == 'DF') selected @endif</option>
                                                            <option value="CE">CE @if($address->data->state == 'CE') selected @endif</option>
                                                            <option value="BA">BA @if($address->data->state == 'BA') selected @endif</option>
                                                            <option value="AM">AM @if($address->data->state == 'AM') selected @endif</option>
                                                            <option value="AP">AP @if($address->data->state == 'AP') selected @endif</option>
                                                            <option value="AL">AL @if($address->data->state == 'AL') selected @endif</option>
                                                            <option value="AC">AC @if($address->data->state == 'AC') selected @endif</option>
                                                        </select>
                                                        <label class="form-label">Estado</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="button" id="btnAtualizarEndereco" class="btn btn-primary btn-lg">Atualizar Endereço</button>
                                                </div>
                                            </div>
                                            <div id="tab-3" class="tab-pane fade" role="tabpanel">
                                                <br>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="email" id="edtEmail" name="email" class="form-control" value="{{$value->data->email}}" disabled/>
                                                        <label class="form-label">email</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="password" id="edtSenha" name="password" class="form-control" placeholder="Deixar em branco para manter a senha" required/>
                                                        <label class="form-label" >Senha</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="password" id="edtPassword" name="password_confirm" class="form-control" placeholder="Deixar em branco para manter a senha" required/>
                                                        <label class="form-label">Confirmar Senha</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="button" id="btnAtualizarSenha" class="btn btn-primary btn-lg">Atualizar Senha</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="divAlert"></div>
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
    
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{session()->get('token_api')}}';
            var id = $('#edtId').val();
            var api = '{{env('APP_API')}}'

            // mascaras
            $('#edtCpf').mask('000.000.000-00', {reverse: true});
            $('#edtCnpj').mask('00.000.000/0000-00', {reverse: true});
            $('#edtInscricaoEstadual').mask('000.000.000.000', {reverse: true});
            $('#edtCep').mask('00000-000');
            $('#edtTelefone').mask('(00)00000-0000');

            //select
            var select = document.getElementById("tipoCadastro");
            select.addEventListener('change', function(){
                if (select.value=='2') {
                    document.getElementById("divCpf").classList.add("back");
                    document.getElementById("divCnpj").classList.remove("back");
                    $('#edtCpf').val('');
                }else{
                    document.getElementById("divCnpj").classList.add("back");
                    document.getElementById("divCpf").classList.remove("back");
                    $('#edtCnpj').val('');
                }
            })

            //salva dados 
            $(document).on('click', '#btnAtualizarDados', function() {
                var selectTipo = $('#tipoCadastro').val();
                var cpf = $('#edtCpf').val();
                var cnpj = $('#edtCnpj').val();
                var ie = $('#edtInscricaoEstadual').val();
                var nome = $('#edtNome').val();
                var nascimento = $('#edtNascimento').val();
                var apelido = $('#edtApelido').val();
                var telefone = $('#edtTelefone').val();
                console.log(apelido)
                var conf = true;
                
                // valida os campos
                if (selectTipo=='1') {
                    if (cpf == '') {
                        conf = false
                        $("#divAlert").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> O campo CPF é obrigatório.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                    }
                }else{
                    if (cnpj=='' || ie=='') {
                        conf = false;
                        $("#divAlert").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> O campo CNPJ e Inscrição Estadual é obrigatório.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                    }
                }

                if (conf==true) {
                    if (nome =='' || nascimento =='' || apelido=='') {
                        conf = false;   
                        $("#divAlert").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Prencha todos os campos obrigatorios.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");                    
                    }
                }

                if (conf==true) {
                    $.ajax({
                        url:api+"user/"+id,
                        headers: {
                        "Authorization": "Bearer "+token 
                        },
                        type:'put',
                        datatype:'json',
                        data:{name:nome, view_name:apelido, cpf:cpf, cnpj:cnpj, state_registration:id, date_birth:nascimento, telephone:telefone, id:id},                    
                        beforeSend : function(){
                            $('body').loading({
                                message: 'Atualizando dados...'
                            });
                        },
                        success: function(response){
                            $('body').loading('stop');
                            $('#divAlert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>✔</strong> Dados atualizados com sucesso.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
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

            $(document).on('click', '#btnAtualizarEndereco', function() {
                let cep = $('#edtCep').val()
                let numero = $('#edtNumero').val()
                let bairro = $('#edtBairro').val()
                let uf = $('#selectEstado').val()
                let telefone = $('#edtTelefone').val()
                let endereco = $('#edtEndereco').val()
                let complemento = $('#edtComplemento').val()
                let cidade = $('#edtCidade').val()

                if (cep=='' || numero=='' || bairro=='' || uf=='' || telefone=='' || endereco=='' || cidade=='') {
                    $("#divAlert").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Prencha todos os campos obrigatorios.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");                    
                }else{
                    $.ajax({
                        url:"http://localhost:8000/api/address/"+id,
                        headers: {
                        "Authorization": "Bearer "+token 
                        },
                        type:'put',
                        datatype:'json',
                        data:{user_id:id, address:endereco, cep:cep, number:numero, district:bairro, city:cidade, state:uf},                    
                        beforeSend : function(){
                            $('body').loading({
                                message: 'Atualizando Endereço...'
                            });
                        },
                        success: function(response){
                            $('body').loading('stop');
                            $('#divAlert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>✔</strong> Dados atualizados com sucesso.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                        },
                        error: function (request, status, error) {
                            console.log(error,status,request)
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

            $(document).on('click', '#btnAtualizarSenha', function() {
                let senha = $('#edtSenha').val()
                let confSenha = $('#edtPassword').val()

                if ((senha !== confSenha) || (senha == '' || confSenha=='')) {
                    $('#divAlert').html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong>O campo 'senha' e 'confirma senha' devem estar preenchidos de maneira igual!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                }else{
                    $.ajax({
                        url:"http://localhost:8000/api/user/password/"+id,
                        headers: {
                        "Authorization": "Bearer "+token 
                        },
                        type:'put',
                        datatype:'json',
                        data:{password:senha, password_confirmation:confSenha},                    
                        beforeSend : function(){
                            $('body').loading({
                                message: 'Atualizando Senha...'
                            });
                        },
                        success: function(response){
                            $('body').loading('stop');
                            $('#divAlert').html("<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>✔</strong> Senha atualizada com sucesso.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>")
                        },
                        error: function (request, status, error) {
                            console.log(request, status, error)
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