@extends('layouts.login')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <body>
        <x-navbar></x-navbar>

        <section class="position-relative py-4 py-xl-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col">
                        <div class="wrapper">
                            <div class="logo">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY0lurMcKAFv1tdikKmoH7QtAnGOQGxQP1yw&usqp=CAU" alt="">
                            </div>
                            <form class="p-3 mt-3"  method="POST" action="{{route('authenticate.try')}}">
                                @csrf
                                <div class="form-field d-flex align-items-center">
                                    <span class="far fa-user"></span>
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-field d-flex align-items-center">
                                    <span class="fas fa-key"></span>
                                    <input type="password" name="password" placeholder="Senha">
                                </div>
                                <button class="btn mt-3"  type="submit" >Logar</button>
                            </form>
                            <div class="text-center fs-6">
                                <a href="#">Esqueceu a senha?</a>
                            </div>
                            @include('components.messages.message')

                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        @include('components.footer')

        @section('js')
        
        <script>
        </script>

        @endsection

    </body>
@endsection