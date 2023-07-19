@extends('layouts.admin')
@section('title', 'Informacion de Empresa')
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
    {{-- <li class="nav-item d-one d-lg-flex">
        <a href="{{ route('clients.create') }}">
            <span class="btn btn-success">+ Crear nuevo</span>
        </a>
    </li> --}}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Empresa
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('business.index') }}">Empresa</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Productos</h4> --}}
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Empresa</h4>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong><i class="fa fa-qrcode mr-1"></i>Nombre</strong>
                        <p class="text-muted">
                            {{ $business->name }}
                        </p>
                        <hr>
                        <strong><i class="fas fa-address-card mr-1"></i>Descripcion</strong>
                        <p class="text-muted">
                            {{ $business->description }}
                        </p>
                        <hr>
                        <strong><i class="fa fa-camera mr-1"></i>Correo Electronico</strong>
                        <p class="text-muted">
                            {{ $business->mail }}
                        </p>
                        <hr>
                    </div>
                    <div class="form-group col-md-6">
                        <strong><i class="fas fa-camera mr-1"></i>RUC</strong>
                        <p class="text-muted">
                            {{ $business->ruc }}
                        </p>
                        <hr>
                        <strong><i class="fas fa-envelope mr-1"></i>Direccion</strong>
                        <p class="text-muted">
                            {{ $business->address }}
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong><i class="fas fa-exclamation-circle"></i>Logo</strong><br>
                            </div>
                            <div class="col-md-6">
                                <img style="width: 50px; height:50px;" src="{{ asset('image/'.$business->logo) }}" alt="logo">
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

            </div>
            <div class="card-footer text-muted">
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                    data-target="#exampleModal-2">Actualizar Informacion</i></button>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- ==================================================================================== --}}

                {!! Form::model($business, ['route' => ['business.update', $business], 'method' => 'PUT', 'files' => true]) !!}


                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $business->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ $business->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="mail">Correo electronico</label>
                        <input type="email" name="mail" id="mail" class="form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $business->mail }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Direccion</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $business->address }}">
                    </div>
                    <div class="form-group">
                        <label for="ruc">RUC</label>
                        <input type="text" name="ruc" id="ruc" class="form-control" placeholder=""
                            aria-describedby="helpId" value="{{ $business->ruc }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title d-flex">Logo
                            <small class="ml-auto align-self-end">
                                <a href="#" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                            </small>
                        </h5>
                        <input type="file" name="picture" id="picture" class="dropify" />
                        <small>Seleccione una imagen siempre por favor</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script> --}}
    {{-- {!! Html::script('js/my_functions.js') !!} --}}
    {!! Html::script('Melody/js/data-table.js') !!}
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
