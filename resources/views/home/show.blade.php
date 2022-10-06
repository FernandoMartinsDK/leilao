@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-Simple-Slider.css">
@endsection

<x-navbar user='FULANO'></x-navbar>

@section('content')
    <div class="container-fluid" style="padding: 0px;padding-right: 8px;">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <section class="py-4 py-xl-5">
                            <div class="container-fluid h-100">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center" style="background: #c6bfbf;"><span style="font-size: 51px;">YAMAHA SUPER TENERE - SOROCABA, SP</span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center" style="margin-top: 20px;">
                                            <h4>LOTE DE MOTOS</h4><button class="btn btn-danger active" type="button">Você não está habilitado para fazer lances</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4 py-xl-5" style="padding: 0px;">
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col-xxl-4">
                <div class="simple-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;) center center / cover no-repeat;"></div>
                            <div class="swiper-slide" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;) center center / cover no-repeat;"></div>
                            <div class="swiper-slide" style="background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;) center center / cover no-repeat;"></div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card">
                        <div class="card-body text-bg-success border rounded-0">
                            <h6 class="text-center card-title">ABERTO PARA LANCES</h6>
                            <h4 class="text-center text-light card-subtitle mb-2">Dê seu lance</h4>
                        </div>
                    </div>
                    <div class="d-grid gap-2"><button class="btn btn-outline-secondary" type="button" style="margin-left: 20PX;margin-right: 20PX;margin-top: 15PX;">Cobrir o lance atual em R$200,00</button>
                        <div class="input-group" style="margin-top: 10px;padding-right: 20px;padding-left: 20px;">
                            <span class="input-group-text">Fazer um lance</span>
                            <input class="form-control" type="text" placeholder="Informe o valor">
                            <button class="btn btn-primary" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor" class="fs-4">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M568.2 336.3c-13.12-17.81-38.14-21.66-55.93-8.469l-119.7 88.17h-120.6c-8.748 0-15.1-7.25-15.1-15.99c0-8.75 7.25-16 15.1-16h78.25c15.1 0 30.75-10.88 33.37-26.62c3.25-20-12.12-37.38-31.62-37.38H191.1c-26.1 0-53.12 9.25-74.12 26.25l-46.5 37.74L15.1 383.1C7.251 383.1 0 391.3 0 400v95.98C0 504.8 7.251 512 15.1 512h346.1c22.03 0 43.92-7.188 61.7-20.27l135.1-99.52C577.5 379.1 581.3 354.1 568.2 336.3zM279.3 175C271.7 173.9 261.7 170.3 252.9 167.1L248 165.4C235.5 160.1 221.8 167.5 217.4 179.1s2.121 26.2 14.59 30.64l4.655 1.656c8.486 3.061 17.88 6.095 27.39 8.312V232c0 13.25 10.73 24 23.98 24s24-10.75 24-24V221.6c25.27-5.723 42.88-21.85 46.1-45.72c8.688-50.05-38.89-63.66-64.42-70.95L288.4 103.1C262.1 95.64 263.6 92.42 264.3 88.31c1.156-6.766 15.3-10.06 32.21-7.391c4.938 .7813 11.37 2.547 19.65 5.422c12.53 4.281 26.21-2.312 30.52-14.84s-2.309-26.19-14.84-30.53c-7.602-2.627-13.92-4.358-19.82-5.721V24c0-13.25-10.75-24-24-24s-23.98 10.75-23.98 24v10.52C238.8 40.23 221.1 56.25 216.1 80.13C208.4 129.6 256.7 143.8 274.9 149.2l6.498 1.875c31.66 9.062 31.15 11.89 30.34 16.64C310.6 174.5 296.5 177.8 279.3 175z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <p class="d-inline-flex" style="font-weight: bold;">Lances fixados em +&nbsp;&nbsp;</p>
                        <p class="d-inline-flex">R$ 200,00</p>
                        <h5 class="text-center">LANCE ATUAL</h5>
                        <h2 class="text-center">R$ 10.000,00</h2>
                        <div class="text-center">
                            <p class="text-secondary d-inline-flex mb-0">Feito por:&nbsp;</p>
                            <p class="text-secondary d-inline-flex mb-0">Marcos</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card">
                        <div class="card-body text-bg-dark border rounded-0">
                            <h4 class="text-center card-title" style="font-weight: bold;">LEILÃO ENCERRA EM</h4>
                            <h4 class="text-center card-subtitle mb-2">10:55:45</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#tab-informacoes" type="button" role="tab" aria-controls="tab-informacoes" aria-selected="false">Informações</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab-descricao" type="button" role="tab" aria-controls="tab-descricao" aria-selected="true">Descrição</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#tab-observacoes" type="button" role="tab" aria-controls="tab-observacoes" aria-selected="false">Obeservações</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab-historico" type="button" role="tab" aria-controls="tab-historico" aria-selected="false">Historico de Lance</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="tab-informacoes" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">.Informações..</div>
                <div class="tab-pane fade show active" id="tab-descricao" role="tabpanel" aria-labelledby="home-tab" tabindex="0">..DESCRIÇAO.</div>
                <div class="tab-pane fade" id="tab-observacoes" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">..Obeservações.</div>
                <div class="tab-pane fade" id="tab-historico" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">..Historico de Lance.</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

        // Initializing the swiper plugin for the slider.
        // Read more here: http://idangero.us/swiper/api/

        var mySwiper = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination' ,
                clickable: true
            },
            paginationClickable: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });

        });
    </script>
@endsection