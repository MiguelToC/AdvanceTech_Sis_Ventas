@extends('layouts.admin')
@section('title', 'información del producto')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Detalles de Producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{ asset('image/' . $product->image) }}" alt="imagen_prod"
                                        class="img-lg rounded-circle mb-3">
                                    <h3>{{ $product->name }}</h3>
                                    <div class="d-flex justify-content-between">
                                    </div>
                                </div>
                                
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Estado del Producto
                                        </span>
                                        <span class="float-right text-muted">
                                            {{$product->status}}
                                        </span>
                                    </p>
                                </div>
                                {{-- <button class="btn btn-primary btn-block">{{$product->status}}</button> --}}
                                @if ($product->status == 'ACTIVED')
                                <button class="btn btn-success btn-block">{{$product->status}}</button>
                                @else
                                <button class="btn btn-danger btn-block">{{$product->status}}</button>
                                @endif
                            </div>
                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>Información de producto</h4>
                                    </div>
                                </div>
                                <div class="profile-feed">
                                    <div class="d-flex align-items-start profile-feed-item">
                                        <div class="form-group col-md-6"> 
                                            <strong><i class="fa fa-qrcode mr-1"></i>Codigo</strong>
                                            <p class="text-muted">
                                                {{ $product->code }}
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-address-card mr-1"></i>Nombre</strong>
                                            <p class="text-muted">
                                                {{ $product->name }}
                                            </p>
                                            <hr>

                                            <strong><i class="fa fa-book mr-1"></i>Stock</strong>
                                            <p class="text-muted">
                                                {{ $product->stock }}
                                            </p>
                                            <hr>

                                            <strong><i class="fa fa-camera mr-1"></i>Imagen</strong>
                                            <p class="text-muted">
                                                {{ $product->image }}
                                            </p>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <strong><i class="fas fa-camera mr-1"></i>Precio de venta</strong>
                                            <p class="text-muted">
                                                S/{{ $product->sell_price }}
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-envelope mr-1"></i>Estado</strong>
                                            <p class="text-muted">
                                                {{ $product->status }}
                                            </p>
                                            <hr>
                                            <strong><i class="fas fa-map-marked-alt mr-1"></i>Categoria</strong>
                                            <p class="text-muted">
                                                {{ $product->category->name }}
                                            </p>

                                            <hr>
                                            <strong><i class="fa fa-truck mr-1"></i>Proveedor</strong>
                                            <p class="text-muted">
                                                {{ $product->provider->name }}
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('products.index') }}" class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
