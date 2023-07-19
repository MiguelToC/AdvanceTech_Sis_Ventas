<div class="form-group row">
    <div class="col-md-6 text-center">
        <label class="form-control-label" for="nombre">Cliente</label>
        <p><a href="{{ route('clients.show', $sale->client_id) }}"></a>{{ $sale->client_id }}</p>
    </div>
    <div class="col-md-6 text-center">
        <label class="form-control-label" for="num_compra">Vendedor</label>
        <p>{{ $sale->user->name }}</p>
    </div>
    <div class="col-md-6 text-center">
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
                    <th colspan="3">
                        <p align="right">TOTAL IMPUESTO ({{ $sale->tax }}%)</p>
                    </th>
                    <th>
                        <p align="right">s/{{ number_format(($subtotal * $sale->tax) / 100, 2) }}</p>
                    </th>
                </tr>

                <tr>
                    <th colspan="3">
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
                        <td>{{$saleDetail->discount}} %</td>
                        <td>{{$saleDetail->quantity}}</td>
                        <td>s/{{ number_format($saleDetail->quantity * $saleDetail->price - $saleDetail->quantity*$saleDetail->price*$saleDetail->discount/100,2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<tr class="selected" id="fila' + cont +'">
    <td>
        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');">
            <i class="fa fa-times fa-2x"></i>
        </button>
    </td>
    <td>
        <input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '
    </td>
    <td>
        <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '">
        <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled>
    </td>
    <td>
        <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '">
        <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled>
    </td>
    <td>
        <input type="hidden" name="quantity[]" value="' + quantity + '">
        <input type="number" value="' + quantity + '" class="form-control" disabled>
    </td>
    <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td>
</tr>
