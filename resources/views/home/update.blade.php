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
                                                        <input type="text" id="edtNome" name="name" class="form-control" required/>
                                                        <label class="form-label" for="form3Example1c">Nome* </label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="date" id="edtNascimento" name="dt_nascimento" class="form-control" required/>
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
                                                            <input id="edtCpf" type="text" class="form-control" />
                                                            <label class="form-label" >CPF*</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="divCnpj" class="back">
                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                        <div class="form-outline flex-fill mb-0">
                                                            <input type="text" id="edtCnpj" class="form-control" />
                                                            <label class="form-label">CNPJ</label>
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
                                                        <input type="text" id="edtTelefone" name="telephone" class="form-control" required/>
                                                        <label class="form-label" for="form3Example4c">Telefone Celeular*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtApelido" name="view_name" class="form-control"  required/>
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
                                                        <input type="text" id="edtEndereco" name="address" class="form-control" required/>
                                                        <label class="form-label" for="form3Example4c">Endereço*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtComplemento" name="complement" class="form-control"/>
                                                        <label class="form-label">Complemento</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtCidade" name="city" class="form-control" required/>
                                                        <label class="form-label" >Cidade*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtCep" name="cep" class="form-control" required/>
                                                        <label class="form-label" for="form3Example4c">CEP*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="number" id="edtNumero" name="number" class="form-control" required/>
                                                        <label class="form-label" >Número*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="edtBairro" name="district" class="form-control" required/>
                                                        <label class="form-label" >Bairro*</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <select name="state" id="selectEstado" class="form-select" required>
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
                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="button" id="btnAtualizarEndereco" class="btn btn-primary btn-lg">Atualizar Endereço</button>
                                                </div>
                                            </div>
                                            <div id="tab-3" class="tab-pane fade" role="tabpanel">
                                                <br>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="email" id="edtEmail" name="email" class="form-control" disabled/>
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
            var token = '';
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
                let selectTipo = $('#tipoCadastro').val()
                let cpf = $('#edtCpf').val()
                let cnpj = $('#edtCnpj').val()
                let ie = $('#edtInscricaoEstadual').val()
                let nome = $('#edtNome').val()
                let nascimento = $('#edtNascimento').val()
                let apelido = $('#edtApelido').val()
                
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
                    if (nome=='' || nascimento=='' || cep=='' || numero=='' || bairro=='' || uf=='' || telefone=='' || endereco=='' || cidade=='' || apelido) {
                        conf = false;   
                        $("#divAlert").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Atenção!</strong> Prencha todos os campos obrigatorios.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");                    
                    }
                }

                if (conf==true) {
                    $.ajax({
                        url:"http://localhost:8000/api/user",
                        headers: {
                        "Authorization": "Bearer " + token
                        },
                        datatype:'json',
                        data:{valor:lance, item_id:item, category:cate, user:user},                    
                        beforeSend : function(){
                            $('body').loading({
                                message: 'Aplicando o lance...'
                            });
                        },
                        success: function(response){
                            cosole.log(response)
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
            });

            $(document).on('click', '#btnAtualizarSenha', function() {
                let senha = $('#edtSenha').val()
                let confSenha = $('#edtPassword').val()
            });

        });
    </script>
@endsection