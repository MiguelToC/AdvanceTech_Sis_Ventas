<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de Venta</title>
<style>
    body {
        position: relative;
        width: 16cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #555555;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-family: SourceSansPro;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }

    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        text-align: justify;
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        position: relative;
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background: #33AFFF;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #faproveedor {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }

    #faproveedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #faccomprador {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #faccomprador thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }
</style>

<body>

    <header>
        {{-- <div id="logo">
            <img src="Melody/images/logo.png" alt="" id="imagen">
        </div> --}}
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL VENDEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre: {{ $sale->user->name }}<br>
                                {{--  {{$sale->provider->document_type}}-COMPRA: {{$sale->provider->document_number}}<br>  --}}
                                {{-- Dirección: {{ $sale->user->address }}<br>
                                Teléfono: {{ $sale->user->phone }}<br> --}}
                                Email: {{ $sale->user->email }}</p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            {{--  <p>{{$sale->provider->document_type}} COMPRA<br />
                {{$sale->provider->document_number}}</p>  --}}
            <h4>NUMERO DE VENTA {{ $sale->id }}</h4>
        </div>
        <br>
        <br>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>FECHA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $sale->user->name }}</td>
                        <td>{{ $sale->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th style="font-size: 12px">CANTIDAD</th>
                        <th style="font-size: 12px">PRODUCTO</th>
                        <th style="font-size: 12px">PRECIO VENTA (PEN)</th>
                        <th style="font-size: 12px">DESCUENTO (%)</th>
                        <th style="font-size: 12px">SUBTOTAL (PEN)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td>{{ $saleDetail->quantity }}</td>
                            <td>{{ $saleDetail->product->name }}</td>
                            <td>s/ {{ $saleDetail->price }}</td>
                            <td>{{ $saleDetail->discount }}</td>
                            <td>s/
                                {{ number_format($saleDetail->quantity * $saleDetail->price - ($saleDetail->quantity * $saleDetail->price * $saleDetail->discount) / 100, 2) }}
                            </td>
                            {{-- MINUTO 4:40  --}}
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="4">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">s/ {{ number_format($subtotal, 2) }}
                            <p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL IMPUESTO ({{ $sale->tax }}%):</p>
                        </th>
                        <td>
                            <p align="right">s/ {{ number_format(($subtotal * $sale->tax) / 100, 2) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">s/ {{ number_format($sale->total, 2) }}
                            <p>
                        </td>
                    </tr>

                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        
        <div id="datos">
            <h4>Nombre de Empresa: {{$company->name}}</h4>
            <h4>Correo: {{$company->mail}}</h4>
            <h4>Direccion: {{$company->address}}</h4>
            <h4>RUC: {{$company->ruc}}</h4>
        </div>
    </footer>
</body>

</html>
