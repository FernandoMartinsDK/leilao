@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/sl-1.4.0/datatables.min.css"/>
@endsection

<x-navbar user='FULANO'></x-navbar>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <section class="py-4 py-xl-5">
                    <div class="container h-100">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Instituições Financeiras</p>

                        <div id="divCampo" class="back">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nome:</span>
                                <input id="edtNome" type="text" class="form-control" placeholder="Nova Instituição Financeira">
                                <span class="input-group-text">CNPJ:</span>
                                <input id="edtCnpj" type="text" class="form-control" placeholder="Número do CNPJ">
                                <div id="divBntCriar"> <button class="btn btn-outline-success" type="button" id="bntCriar">Adicionar</button> </div>
                                <div id="divBntAtualizar"> 
                                    <button class="btn btn-outline-success" type="button" id="bntAtualizar">Atualizar</button> 
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped maximize" id="table" style="width: 100%;">
                            <thead class="thead-dark">
                                <th>Cod.</th>
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th>Dt.Homologação</th>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < sizeof($value->data); $i++)
                                    <tr>
                                        <td>{{$value->data[$i]->id}}</td>
                                        <td>{{$value->data[$i]->name}}</td>
                                        <td>{{$value->data[$i]->cnpj}}</td>
                                        <td>{{\Carbon\Carbon::parse($value->data[$i]->created_at)->format('d/m/Y')}}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/sl-1.4.0/datatables.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            var tabela = $('#table').DataTable({
                responsive:true,
                language:{
                    url: "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
                },
                pageLength:15,
                select: 'single',
                dom:'Bfrtip',
                altEditor: true,
                buttons:[
                    {
                        text: 'Novo',
                        action: function ( ) {
                            $("#divCampo").removeClass('back');
                            $("#divBntAtualizar").addClass('back');
                            $("#divBntCriar").removeClass('back');
                            $("#divBntAtualizar").addClass('back');
                            $("#edtNome").val("")
                            $("#edtCnpj").val("")
                        }
                    },
                    {
                        extend: 'selected',
                        text: 'Editar',
                        action: function ( ) {
                            $.map(this.rows('.selected').data(), function (item) {
                                $("#divCampo").removeClass('back');
                                $("#edtNome").val(item[1])
                                $("#edtCnpj").val(item[2])
                                $("#divBntCriar").addClass('back');
                                $("#divBntAtualizar").removeClass('back');
                                vid = item[0];
                            });
                        }
                    },
                    {
                        extend: 'selected',
                        text: 'Remover',
                        action: function ( ) {
                            $.map(this.rows('.selected').data(), function (item) {
                                Swal.fire({
                                    title: 'Remoção da '+item[1],
                                    text: "Verifique que não haja leilões vinculados a essa instituição!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Sim, deletar!'
                                }).then((result) => {
                                    toDo(item[0],'','','delete')
                                    Swal.fire(
                                        'Registro removido!',
                                        'Espero que você saiba oque esta fazendo!',
                                        'success'
                                    )
                                    $("#divCampo").addClass('back');
                                })
                            });
                        }
                    }
                ]
            });

            $(document).on('click', '#bntCriar', function() {
                let nome = $("#edtNome").val();
                let cnpj = $("#edtCnpj").val();
                
                if (nome=='' || cnpj=='') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Preencha os campos corretamente!',
                        showConfirmButton: false,
                        timer: 2500
                    })
                } else {
                    toDo('',nome,cnpj,'post')
                }
            });

            $(document).on('click', '#bntAtualizar', function() {
                let nome = $("#edtNome").val();
                let cnpj = $("#edtCnpj").val();
                let id = $("#edtId").val();

                if (nome=='' || cnpj=='') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Preencha os campos corretamente!',
                        showConfirmButton: false,
                        timer: 2500
                    })
                } else {
                    toDo(vid,nome,cnpj,'PUT')
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var token = '{{session()->get('token_api')}}';

            var vid=0;

            function toDo(id,nome,cnpj,action) {
                $.ajax({
                    url:"http://localhost:8000/api/financial_institutions/"+id,
                    headers: {
                        "Authorization": "Bearer "+token 
                    },
                    type:action,
                    datatype:'json',
                    data:{name:nome, cnpj:cnpj},                    
                    beforeSend : function(){
                        $('body').loading({
                            message: 'Processando...'
                        });
                    },
                    success: function(response){
                        console.log(response)

                        if (response['message']=='success') {
                            if (action == 'post') {
                               
                            }
                            switch (action) {
                                case 'post':
                                    tabela.row.add([response['data']['id'], response['data']['name'], response['data']['cnpj'], 'Agora']).draw(false);
                                    $("#edtNome").val("")
                                    $("#edtCnpj").val("")
                                    $("#divCampo").addClass('back');
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Adicionado com sucesso!',
                                        showConfirmButton: false,
                                        timer: 2500
                                    })
                                    break;
                                case 'PUT':
                                    tabela.rows({ selected: true }).every(function (rowIdx, tableLoop, rowLoop) {
                                        tabela.cell(rowIdx,1).data($('#edtNome').val());
                                        tabela.cell(rowIdx,2).data($('#edtCnpj').val());
                                        $("#edtNome").val("")
                                        $("#edtCnpj").val("")
                                        $("#divCampo").addClass('back');
                                    }).draw();
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Atualizado com sucesso!',
                                        showConfirmButton: false,
                                        timer: 2500
                                    })
                                    break;
                                case 'delete':
                                    $("#edtNome").val("")
                                    $("#edtCnpj").val("")
                                    tabela.row('.selected').remove().draw( false );
                                    $("#divCampo").addClass('back');
                                    break
                                default:
                                    alert(action)
                                    break;
                            }
                        }
                        $('body').loading('stop'); 
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
                    }
                }).done(function () {
                    $('body').loading('stop');
                });
            }
                
        });
    </script>
@endsection