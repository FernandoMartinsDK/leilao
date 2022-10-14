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
                <section class="py-4 py-xl-5" style="margin-top: 20px;">
                    <div class="container h-100">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Detalhamento</p>

                        <table class="table table-striped maximize" id="table" style="width: 100%;">
                            <thead class="thead-dark">
                                <th>Lance</th>
                                <th>Nome</th>
                                <th>Valor Lance</th>
                                <th>Data</th>
                            </thead>
                            <tbody>
                                <div class="card" style="margin-top: 60px; margin-bottom: 40px;">
                                   <div class="row" style="margin: 20px">
                                        <div class="col">
                                            <p><strong>Categoria: </strong>{{$category}}</p>
                                            <p><strong>Incremento: </strong>{{$info->data->minimum_bid}}</p>
                                            <p><strong>Local: </strong>{{$info->data->place}}</p>
                                            <p><strong>Ins.Financeira: </strong>{{$info->data->financial_institution}}</p>
                                        </div>
                                        <div class="col">
                                            <p><strong>Id item: </strong>{{$info->data->item_id}}</p>
                                            <p><strong>Lance inicial: </strong>{{$historic->data[0]->opening_bid}}</p>
                                            <p><strong>Data Leilão: </strong>{{\Carbon\Carbon::parse($info->data->auction_date)->format('d/m/Y - H:m')}}</p>
                                            <p><strong>Cidade:</strong> {{$info->data->place_city}}</p>
                                        </div>
                                   </div>
                                   <hr>
                                    <div class="row" style="margin: 20px">
                                        @if ($idCat==1)
                                            <div class="col">
                                                <p><strong>Local: </strong>{{$info->data->place}}</p>
                                            </div>
                                            <div class="col">
                                                <p><strong>Cidade: </strong>{{$info->data->immobiles_city}}</p>
                                            </div>
                                            <div class="col">
                                                <p><strong>CEP: </strong>{{$info->data->place_cep}}</p>
                                            </div>
                                        @else
                                            <div class="col">
                                                <p><strong>Marca: </strong>{{$info->data->brand}}</p>
                                            </div>
                                            <div class="col">
                                                <p><strong>Modelo: </strong>{{$info->data->model_car}}</p>
                                            </div>
                                            <div class="col">
                                                <p><strong>Tipo: </strong>{{$info->data->model}}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @for ($i = 0; $i < sizeof($historic->data); $i++)
                                    <tr>
                                        <td>{{$i+1}}º</td>
                                        <td>{{$historic->data[$i]->name}}</td>
                                        <td>{{$historic->data[$i]->value_bid}}</td>
                                        <td>{{\Carbon\Carbon::parse($historic->data[$i]->created_at)->format('d/m/Y - H:m')}}</td>
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
                        },"targets": [2] 
                    }
                ]    
            });
                
        });
    </script>
@endsection