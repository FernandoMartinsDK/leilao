@extends('layouts.app')

@section('css')
<link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

<x-navbar user='FULANO'></x-navbar>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <section class="py-4 py-xl-5">
                    <div class="container h-100">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Item dos Leilões</p>
                        <a href="{{route('item.create')}}" style="margin-bottom: 5px;" type="button" class="btn btn-outline-success btn-sm">Adicionar Item <i class="fa-solid fa-plus"></i></a>
                        <table class="table table-striped maximize" id="table" style="width: 100%;">
                            <thead class="thead-dark">
                                <th>Id Item</th>
                                <th>Lote</th>
                                <th>Adicionado</th><!-- data de criação-->
                                <th>Vendido</th> <!-- se foi vendido -->
                                <th>Categoria</th>
                                <th>Lugar</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < sizeof($values->data); $i++)
                                <tr>
                                    <td>{{$values->data[$i]->id_item}}</td>
                                    <td>Lote - {{$values->data[$i]->lote}}</td>
                                    <td>{{\Carbon\Carbon::parse($values->data[$i]->created_at)->format('d/m/Y')}}</td>
                                    <td>@if ($values->data[$i]->sold==null)
                                        NÃO
                                    @else
                                        SIM
                                    @endif</td>
                                    <td>{{$values->data[$i]->category}}</td>
                                    <td>{{$values->data[$i]->name}}</td>
                                    <td>
                                        <a type="button" class="btn btn-outline-primary" href="#">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a type="button" class="btn btn-outline-dark bntDelete" id="{{$values->data[$i]->id_item }}" >
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a type="button" class="btn btn-outline-danger bntDelete" id="{{$values->data[$i]->id_item }}" >
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){

            $('#table').DataTable({
                responsive:true,
                language:{
                    url: "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
                },
                pageLength:10
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{session()->get('token_api')}}';

            $(document).on('click', '.bntDelete', function() {
                var vid = $(this).attr('id');

            });
            

        });
    </script>
@endsection