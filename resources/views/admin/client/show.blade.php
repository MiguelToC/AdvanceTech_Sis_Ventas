@extends('layouts.admin')
@section('title','información del cliente')
@section('styles')
    <style type="text/css">
        .decoration{
            text-decoration: none
        }
    </style>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const textoP = document.querySelector('#miParrafo').textContent;
            if (textoP.trim() === '') {
                document.querySelector('#miParrafo').textContent = 'Sin datos';
            }
        });
    </script>
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
            Detalles de Cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li> 
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$client->name}}</li>
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
                                <h3>{{$client->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        Sobre cliente
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">
                                        <a class="decoration" href="{{route('clients.create')}}">
                                            <span>Crear nuevo Cliente</span>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de cliente</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                        <p class="text-muted">
                                            {{$client->name}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-address-card mr-1"></i> DNI</strong>
                                        <p class="text-muted">
                                            {{$client->dni}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-address-card mr-1"></i>Numero de RUC</strong>
                                        <p class="text-muted" id="miParrafo">
                                            {{$client->ruc}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Direccion</strong>
                                        <p class="text-muted">
                                            {{$client->address}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i>Telefono</strong>
                                        <p class="text-muted">
                                            {{$client->phone}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-map-marked-alt mr-1"></i>Correo Electronico</strong>
                                        <p class="text-muted">
                                            {{$client->email}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('clients.index')}}" class="btn btn-primary float-right">Regresar</a>
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