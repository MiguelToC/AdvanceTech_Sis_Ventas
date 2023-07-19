@extends('layouts.admin')
@section('title', 'Registrar Usuarios')
@section('styles')

@endsection
{{-- @section('create')
    <li class="nav-item d-one d-lg-flex">
        <a href="{{ route('users.create') }}">
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
                Registro de usuarios
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de Usuarios</li>
                    </ol>
                </nav>
        </div>
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Usuarios</h4> --}}
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Registro de Usuarios</h4>

                </div>

                {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}
                

                @include('admin.user._form')

                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('users.index') }}" class="btn btn-light">
                    Cancelar
                </a>

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
