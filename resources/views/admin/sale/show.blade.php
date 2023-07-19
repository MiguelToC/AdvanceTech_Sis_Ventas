@extends('layouts.admin')
@section('title', 'Detalle de venta')
@section('styles')
    <style type="text/css">
        .boxcito {
            background-color: rgb(221, 219, 219);
            margin-right: 80px;
            border-radius: 20px;

            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .primera {
            margin-left: 50px;
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
                Detalles de venta ID: {{ $sale->id }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $sale->id }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-3 text-center boxcito primera">
                                <label class="form-control-label" for="nombre">Cliente</label>
                                <p><a href="{{ route('clients.show', $sale->client_id) }}">{{ $sale->client->name }}</a></p>
                            </div>
                            <div class="col-md-3 text-center boxcito">
                                <label class="form-control-label" for="num_compra">Vendedor</label>
                                <p>{{ $sale->user->name }}</p>
                            </div>
                            <div class="col-md-3 text-center boxcito">
                                <label class="form-control-label" for="num_compra">Numero de venta</label>
                                <p>{{ $sale->id }}</p>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group row">
                            <h4 class="card-title ml-3">Detalle de venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="saleDetails" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio de venta (PEN)</th>
                                            <th>Descuento(PEN)</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (PEN)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">SUBTOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">s/{{ number_format($subtotal, 2) }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTO ({{ $sale->tax }}%)</p>
                                            </th>
                                            <th colspan="4">
                                                <p align="right">s/{{ number_format(($subtotal * $sale->tax) / 100, 2) }}
                                                </p>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th colspan="3">
                                                <p align="right">s/{{ number_format($sale->total, 2) }}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($saleDetails as $saleDetail)
                                            <tr>
                                                <td>{{ $saleDetail->product->name }}</td>
                                                <td>S/{{ $saleDetail->price }}</td>
                                                <td>{{ $saleDetail->discount }} %</td>
                                                <td>{{ $saleDetail->quantity }}</td>
                                                <td>s/{{ number_format($saleDetail->quantity * $saleDetail->price - ($saleDetail->quantity * $saleDetail->price * $saleDetail->discount) / 100, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('sales.index') }}" class="btn btn-primary float-right">Regresar</a>
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
