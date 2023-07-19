<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Client;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
//CARBON ES UNA LIBRERIA PARA OBTENER EL DIA, HORA, FECHA EXACTA
use Carbon\Carbon;
//LIBRERIA PARA LA AUTENTIFICACION
use Illuminate\Support\Facades\Auth;
//LIBRERIA PARA DESCARGAR PDF
use Barryvdh\DomPDF\Facade\Pdf;
//LIBRERIA PARA IMPRIMIR DOCUMENTOS
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index' , compact('sales'));
    }

    public function create()
    {
        $products = Product::get();
        $clients = Client::get();
        return view('admin.sale.create', compact('clients','products'));
    }

    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Lima')
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key],
            "discount"=>$request->discount[$key]);
        }
        $sale->saleDetails()->createMany($results);
        

        return redirect()->route('sales.index'); 
    }

    public function show(Sale $sale)
    {

        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal+=$saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price*$saleDetail->discount/100;
        }

        return view('admin.sale.show' , compact('sale','saleDetails','subtotal'));
    }

    public function edit(Sale $sale)
    {
        // $clients = Client::get();
        // return view('admin.sale.edit' , compact('sale'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        // $sale->udpate($request->all());
        // return redirect()->route('sales.index'); 
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index'); 
    }
    public function pdf(Sale $sale)
    {
        $company = Business::where('id', 1)->firstOrFail();
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal+=$saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price*$saleDetail->discount/100;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale','subtotal','saleDetails','company'));
        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
    }
    public function print(Sale $sale){
        try {
            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal+=$saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price*$saleDetail->discount/100;
            }

            $printer_name = "Nombre de su impresora";
            $conector = new WindowsPrintConnector($printer_name);
    	    $printer = new Printer($conector);
    	    $printer->text("El texto que quiere");
    	    $printer->cut();
            $printer->close();

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
    public function change_status(Sale $sale)
    {
        if ($sale->status == 'VALID') {
            $sale->update(['status'=>'CANCELED']);
            return redirect()->back();
        } else {
            $sale->update(['status'=>'VALID']);
            return redirect()->back();
        }
    }
}
