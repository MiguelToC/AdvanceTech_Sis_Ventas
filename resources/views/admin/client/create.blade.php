@extends('layouts.admin')
@section('title', 'Registrar Cliente')
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
        <a href="{{ route('clients.create') }}">
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
                Registro de clientes
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
                    </ol>
                </nav>
        </div>
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Categorias</h4> --}}
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Registro de clientes</h4>

                </div>

                {!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                        required>
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId"
                        required>
                </div>
                <div class="form-group">
                    <label for="ruc_number">RUC</label>
                    <input type="number" class="form-control" name="ruc_number" id="ruc_number" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                </div>
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                </div>
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                </div>
                




                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('clients.index') }}" class="btn btn-light">
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

                {!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}

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
    {!! Html::script('Melody/js/data-table.js') !!}
    {{-- {!! Html::script('Melody/js/dropify.js') !!} --}}
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
