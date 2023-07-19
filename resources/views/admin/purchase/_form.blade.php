<div class="form-group">
    <label for="provider_id">Proveedores</label>
    <select class="form-control" name="provider_id" id="provider_id">
        @foreach ($providers as $provider)
            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="tax">Impuesto</label>
    <input type="text" class="form-control" name="tax" id="tax" aria-describedby="helpId" value="18">
</div>

<div class="form-group">
    <label for="product_id">Producto</label>
    <select class="form-control" name="product_id" id="product_id">
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="quantity">Cantidad</label>
    <input type="text" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
</div>

<div class="form-group">
    <label for="price">Precio</label>
    <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId">
</div>

<div class="form-group mb-5">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(PEN)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">PEN 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">PEN 0.00</span> <input
                                type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
