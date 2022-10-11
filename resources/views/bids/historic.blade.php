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
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Historico de Lances</p>
                                    <input type="hidden" id="edtId" value="1">
                                    <div>
                                        fazer HISTORICO DE LANCES DO CLIENTE
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
                        url:"http://localhost:8000/api/user/"+id,
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