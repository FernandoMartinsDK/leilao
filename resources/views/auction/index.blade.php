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
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Leilões</p>
                        <a href="{{route('auction.create')}}" style="margin-bottom: 5px;" type="button" class="btn btn-outline-success btn-sm">Criar novo leilão <i class="fa-solid fa-plus"></i></a>
                        <table class="table table-striped maximize" id="table" style="width: 100%;">
                            <thead class="thead-dark">
                                <th>Lote</th>
                                <th>Data</th>
                                <th>Aberto</th>
                                <th>Categoria</th>
                                <th>Lugar</th>
                                <th>Qt.Item</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < sizeof($value->data); $i++)
                                    <tr>
                                        <td>Lote - {{$value->data[$i]->lote}}</td>
                                        <td>{{\Carbon\Carbon::parse($value->data[$i]->auction_date)->format('d/m/Y - H:m')}}</td>
                                        <td>
                                            @if( trim($value->data[$i]->open) == "T" )
                                                SIM
                                            @else
                                                NÃO
                                            @endif
                                        </td>
                                        <td>{{$value->data[$i]->category}}</td>
                                        <td>{{$value->data[$i]->place}}</td>
                                        <td>{{$value->data[$i]->qt}}</td>
                                        <td>
                                            <a type="button" class="btn btn-outline-primary" href="{{route('auction.edit',[ 'id' => $value->data[$i]->lote ])}}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a type="button" id="{{$value->data[$i]->lote}}" class="btn btn-outline-danger bntDelete">
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = '{{session()->get('token_api')}}';

            $(document).on('click', '.bntDelete', function() {
                var vid = $(this).attr('id');
                $.ajax({
                    url:"http://localhost:8000/api/auctions/"+vid,
                    headers: {
                        "Authorization": "Bearer "+token 
                    },
                    type:'delete',
                    datatype:'json',
                    beforeSend : function(){
                        $('body').loading({
                            message: 'Deletando Leilão...'
                        });
                    },
                    success: function(response){
                        $('body').loading('stop');
                        document.location.reload();
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
                    }
                }).done(function () {
                    $('body').loading('stop');
                });
            });
            

        });
    </script>
@endsection