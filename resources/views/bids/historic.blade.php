@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
@endsection

<x-navbar user='FULANO'></x-navbar>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <section class="py-4 py-xl-5">
                    <div class="container h-100">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Historico de Lances</p>

                        <table class="table table-striped maximize" id="table" style="width: 100%;">
                            <thead class="thead-dark">
                                <th>Nome</th>
                                <th>Lote</th>
                                <th>Categoria</th>
                                <th>Valor do lance</th>
                                <th>Inst.Finance</th>
                                <th>Leilão Aberto</th>
                                <th>Ação</th>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < sizeof($value->data); $i++)
                                    <tr>
                                        <td>{{$value->data[$i]->name}}</td>
                                        <td>Lote - {{$value->data[$i]->id_auction}}</td>
                                        <td>{{$value->data[$i]->category}}</td>
                                        <td>{{$value->data[$i]->value_bid}}</td>
                                        <td>{{$value->data[$i]->financial}}</td>
                                        @if ($value->data[$i]->open=='T')
                                            <td>SIM</td>
                                        @else
                                            <td>NÃO</td>
                                        @endif
                                        <td>
                                            <a type="button" id="{{$value->data[$i]->id_item}}" class="btn btn-outline-dark btn-sm">Detalhar</a>
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

    <script>
        $(document).ready(function(){
                
            $('#table').DataTable({
                responsive:true,
                language:{
                    url: "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
                },
                pageLength:10,
                columnDefs: [ 
                    {"render": function(data){
                        return parseFloat(data).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                        },"targets": [3] 
                    }
                ]    
            });
                
        });
    </script>
@endsection