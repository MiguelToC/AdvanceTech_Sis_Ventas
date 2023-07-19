@extends('layouts.admin')
@section('title', 'Gestión de clientes')
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
        <a href="{{ route('clients.create') }}">
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
                Clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Clientes</h4> --}}
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Clientes
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
                    <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('clients.create') }}" class="dropdown-item" type="button">Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Correo Electronico</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $client->id }}</th>
                                    <td>
                                        <a href="{{ route('clients.show', $client) }}">{{ $client->name }}</a>
                                    </td>
                                    <td>{{ $client->dni }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->email }}</td>



                                    <td style="witdh: 50px;">
                                        {!! Form::open(['route' => ['clients.destroy', $client], 'method' => 'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{ route('clients.edit', $client) }}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit"
                                            title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        {!! Form::close() !!}
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
