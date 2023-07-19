{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.admin')
@section('title', 'Panel Administrador')
@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>
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
                Panel Administrador
            </h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                </ol>
            </nav> --}}
        </div>
        {{-- <div class="card">
            <div class="card-body">
                
                <div class="d-flex justify-content-between">
            
                </div>
                @foreach ($totales as $total)
                    <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="float-right">
                                        <i class="fas fa-cart-arrow-down fa-4x"></i>
                                    </div>
                                    <div class="text-value h3"><strong>
                                            PEN {{ $total->totalcompra }} (MES ACTUAL)</strong>

                                    </div>
                                    <div class="h3">Compras</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                    <a href="{{ route('purchases.index') }}" class="small-box-footer h4">Compras <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <div class="float-right">
                                        <i class="fas fa-shopping-cart fa-4x"></i>
                                    </div>
                                    <div class="text-value h3"><strong>
                                            PEN {{ $total->totalventa }} (MES ACTUAL)</strong>

                                    </div>
                                    <div class="h3">Ventas</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                    <a href="{{ route('sales.index') }}" class="small-box-footer h4">Ventas <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div> --}}

        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Categorias</h4> --}}
                <div class="d-flex justify-content-between">
                    {{-- <h4 class="card-title">Panel Administrador
                    </h4> --}}
                    {{-- <i class="fas fa-ellipsis-v"></i> --}}
                    {{-- <div class="btn-group">
                        <h4 class="card-tittle">
                            <a href="#">
                                <i class="fas fa-download"></i>
                                Exportar
                            </a>
                        </h4>
                        
                    </div> --}}
                    {{-- <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('categories.create') }}" class="dropdown-item" type="button">Agregar</a>

                        </div>
                    </div> --}}

                </div>

                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="text-center">Ventas - Meses</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="ventas" height="100px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Categorias</h4> --}}
                <div class="d-flex justify-content-between">
                    {{-- <h4 class="card-title">Panel Administrador
                    </h4> --}}
                    {{-- <i class="fas fa-ellipsis-v"></i> --}}
                    {{-- <div class="btn-group">
                        <h4 class="card-tittle">
                            <a href="#">
                                <i class="fas fa-download"></i>
                                Exportar
                            </a>
                        </h4>
                        
                    </div> --}}
                    {{-- <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('categories.create') }}" class="dropdown-item" type="button">Agregar</a>

                        </div>
                    </div> --}}

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="text-center">Ventas dias</h4>
                            </div>
                            <div class="card-content">
                                <div class="ct-chart">
                                    <canvas id="ventas_diarias" height="100px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-heading">
                                <h4 class="card-title">Productos más vendidos</h4>
                            </div>
                        </div>
                        <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">
                            <div class="datatable-wrapper table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th>Nombre</th>
                                            <th>Codigo</th>
                                            <th>Stock</th>
                                            <th>Cantidad vendida</th>
                                            <th>Ver Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productosvendidos as $productosvendido)
                                            <tr>
                                                <td>{{ $productosvendido->id }}</td>
                                                <td>{{ $productosvendido->name }}</td>
                                                <td>{{ $productosvendido->code }}</td>
                                                <td><strong>{{ $productosvendido->stock }}</strong> Unidades</td>
                                                <td><strong>{{ $productosvendido->quantity }}</strong> Unidades</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('products.show', $productosvendido->id) }}"><i
                                                            class="far fa-eye"></i>
                                                        Ver Detalles
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')

    {!! Html::script('Melody/js/data-table.js') !!}
    {!! Html::script('Melody/js/chart.js') !!}
    {{-- <script src="../../js/chart.js"></script> --}}

    <script>
        $(function() {
            
            var varVenta = document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg) {
                        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido = strftime('%B', strtotime($reg->mes));
                    
                        echo '"' . $mes_traducido . '",';
                    } ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg) {
                            echo '' . $reg->totalmes . ',';
                        } ?>],
                        backgroundColor: '#f96868',
                        borderColor: '#f96868',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {

                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            radius: 5
                        }
                    }
                }
            });
            var varVenta = document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                {
                    $dia = $ventadia->dia;


                    echo '"'. $dia.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->totaldia.',';} ?>],
                        backgroundColor: '#5E50F9',
                        borderColor: '#3a3f51',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {

                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            radius: 5
                        }
                    }
                }
            });

        });
    </script>
@endsection
