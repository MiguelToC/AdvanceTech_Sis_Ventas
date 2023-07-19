@extends('layouts.admin')
@section('title', 'Editar Producto')
@section('styles')
    <style type="text/css">
        .img-label {
            margin-bottom: 1px
        }

        .img-browser {
            margin-bottom: 20px
        }
    </style>
@endsection
{{-- @section('create')
    <li class="nav-item d-one d-lg-flex">
        <a href="{{ route('products.create') }}">
            <span class="btn btn-primary">+ Crear nuevo</span>
        </a>
    </li>
@endsection --}}
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Edicion de productos
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edicion de productos</li>
                    </ol>
                </nav>
        </div>
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Categorias</h4> --}}
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Edicion de productos</h4>

                </div>


                {{-- {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!} --}}
                {{-- {!! Form::model($product,['route'=>['products.store', $product], 'method'=>'PUT','files' => true]) !!} --}}

                {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}


                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId"
                        value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="sell_price">Precio de venta</label>
                    <input type="number" name="sell_price" id="sell_price" class="form-control" aria-describedby="helpId"
                        value="{{ $product->sell_price }}" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Categorias</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $product->category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="provider_id">Proveedores</label>
                    <select class="form-control" name="provider_id" id="provider_id">
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}" @if ($provider->id == $product->provider->id) selected @endif>
                                {{ $provider->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                    <h4 class="card-title d-flex">Vista Previa de la imagen
                        <small class="ml-auto align-self-end">
                            <a href="#" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                        </small>
                    </h4>
                    <input type="file" name="picture" id="picture" class="dropify" />
                </div>



                <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                <a href="{{ route('products.index') }}" class="btn btn-light">
                    Cancelar
                </a>

                {!! Form::close() !!}
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
    {{-- <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script> --}}
    {{-- {!! Html::script('js/my_functions.js') !!} --}}
    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('Melody/js/dropify.js') !!}


    {{-- <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {
            type: 'PUT'
        };
        $.fn.editableform.buttons =
            '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
            '<i class="fa fa-fw fa-check"></i>' +
            '</button>' +
            '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
            '<i class="fas fa-times"></i>' +
            '</button>';

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $('#products_listing').DataTable({
                responsive: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                dom: "<'row'<'col-sm-2'l><'col-sm-7 text-right'B><'col-sm-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    text: '<i class="fas fa-plus"></i> Nuevo',
                    className: 'btn btn-info',
                    action: function(e, dt, node, conf) {
                        $('#exampleModal-2').modal('show');
                    }
                }],
                "fnRowCallback": function(nRow, mData, iDisplayIndex) {
                    $('#products_listing .second_td a').editable({
                        type: 'select',
                        name: 'Type',
                        title: 'Type',
                        source: [{
                                value: "DRAFT",
                                text: "BORRADOR"
                            },
                            {
                                value: "SHOP",
                                text: "TIENDA"
                            },
                            {
                                value: "POS",
                                text: "PUNTO DE VENTA"
                            },
                            {
                                value: "BOTH",
                                text: "AMBOS"
                            },
                            {
                                value: "DISABLED",
                                text: "DESACTIVADO"
                            },
                        ]
                    });

                },
            });
        });
    </script> --}}
@endsection
