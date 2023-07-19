@extends('layouts.admin')
@section('title', 'Reporte por rango de fecha')
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
    <li class="nav-item d-one d-lg-flex">
        <a href="{{ route('sales.create') }}">
            <span class="btn btn-success">+ Crear nuevo</span>
        </a>
    </li>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Reporte por rango de fecha
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Categorias</h4> --}}
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Reporte por rango de fecha
                    </h4>
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
                            <a href="{{ route('sales.create') }}" class="dropdown-item" type="button">Agregar</a>

                        </div>
                    </div> --}}
                </div>
                {!! Form::open(['route' => 'report.results', 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-12 col-md-3">
                        <span>Fecha inicial</span>
                        <div class="form-group">
                            <input class="form-control" type="date" value="{{ old('fecha_ini') }}" name="fecha_ini"
                                id="fecha_ini">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <span>Fecha Final</span>
                        <div class="form-group">
                            <input class="form-control" type="date" value="{{ old('fecha_fin') }}" name="fecha_fin"
                                id="fecha_fin">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 text-center mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 text-center">
                        <span>Total de ingreso: <b> </b></span>
                        <div class="form-group">
                            <strong>S/ {{ $total }}</strong>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>id </th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <th scope="row">
                                        <a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a>
                                    </th>

                                    <td>{{ $sale->sale_date }}</td>
                                    <td>{{ $sale->total }}</td>
                                    <td>{{ $sale->status }}</td>

                                    <td style="witdh: 50px;">

                                        {{-- <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{ route('sales.edit', $sale) }}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit"
                                            title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> --}}

                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{ route('sales.pdf', $sale) }}"><i class="far fa-file-pdf"></i></a>
                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{ route('sales.print', $sale) }}"><i class="fas fa-print"></i></a>
                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{ route('sales.show', $sale) }}"><i class="far fa-eye"></i></a>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Registrar nuevo producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'products.store', 'method' => 'POST']) !!}

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre de producto</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Continuar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div> --}}
@endsection
@section('scripts')

    {!! Html::script('Melody/js/data-table.js') !!}
    <script>
        window.onload = function() {
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año
            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menos de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            document.getElementById('fecha_fin').value = ano + "-" + mes + "-" + dia;
        }
    </script>

@endsection
