@extends('layouts.app')

@section('content')

                        <main class="py-4">

<div class="super_container">
    <header class="header" style="display: none;">
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-5 order-lg-1 order-2">
                @php
                    $fotos = [];
                    foreach($produto->fotos() as $foto) {
                        array_push($fotos, ['image' => ['src' => "images/$foto", 'lazyload' => false]]);
                    }
              @endphp
                  <x-carousel id="carousel-1" :indicators="true" :control="true" class="mb-3" :items="$fotos"/>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/produtos">Produtos</a></li>
                                <li class="breadcrumb-item active">Accessories</li>
                            </ol>
                        </nav>
                        <div class="product_name">{{$produto->titulo}}</div>

                        <div> <span class="product_price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span> </span></span></strike> </div>

                        <hr class="singleline">
                        <div>
                            <span class="product_info">{{$produto->descricao}}</span>
                        </div>
                        <div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
        </main>
    </div>
@endsection