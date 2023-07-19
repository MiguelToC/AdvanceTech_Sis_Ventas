@extends('layouts.admin')
@section('title', 'Registrar Compras')
@section('styles')
    <link rel="stylesheet" href="sweetalert2.min.css">
@endsection
{{-- @section('create')
    <li class="nav-item d-one d-lg-flex">
        <a href="{{ route('purchases.create') }}">
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
                Registro de Compras
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compras</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de Compras</li>
                    </ol>
                </nav>
        </div>
        <div class="card">
            {!! Form::open(['route' => 'purchases.store', 'method' => 'POST']) !!}
            <div class="card-body">
                {{-- <h4 class="card-title">Compras</h4> --}}
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Registro de Compras</h4>
                </div>

                @include('admin.purchase._form')

            </div>
            <div class="card-footer text-muted">
                <button type="submit" id="guardar" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('purchases.index') }}" class="btn btn-light">
                    Cancelar
                </a>
            </div>
            {!! Form::close() !!}
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
    {{-- {!! Html::script('Melody/js/data-table.js') !!} --}}
    {!! Html::script('Melody/js/avgrund.js') !!}
    {!! Html::script('Melody/js/alerts.js') !!}
    


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
    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });

        var cont = 0;
        total = 0;
        subtotal = [];

        $("#guardar").hide();

        function agregar() {

            product_id = $("#product_id").val();
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            price = $("#price").val();
            impuesto = $("#tax").val();

            if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
                subtotal[cont] = quantity * price;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                    ');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="' +
                    product_id + '">' + producto + '</td> <td> <input type="hidden" id="price[]" name="price[]" value="' +
                    price + '"> <input class="form-control" type="number" id="price[]" value="' + price +
                    '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity +
                    '"> <input class="form-control" type="number" value="' + quantity +
                    '" disabled> </td> <td align="right">s/' + subtotal[cont] + ' </td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la compras',

                })
            }
        }

        function limpiar() {
            $("#quantity").val("");
            $("#price").val("");
        }

        function totales() {
            $("#total").html("PEN " + total.toFixed(2));
            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("PEN" + total);
            $("#total_impuesto").html("PEN" + total_impuesto);
            $("#total_pagar_html").html("PEN" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endsection
