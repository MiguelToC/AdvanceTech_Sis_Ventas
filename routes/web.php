<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', [HomeController::class, 'index'])->name('home');

//===============================================================================================================
Route::get('sales/reports_day', [ReportController::class, 'reports_day'])->name('reports.day');
Route::get('sales/reports_date', [ReportController::class, 'reports_date'])->name('reports.date');


Route::post('sales/report_results', [ReportController::class, 'report_results'])->name('report.results');

//=============================================================================================================

Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('clients', ClientController::class)->names('clients');
Route::resource('products', ProductController::class)->names('products');
Route::resource('providers', ProviderController::class)->names('providers');
//==========================================================================================
Route::resource('purchases', PurchaseController::class)->names('purchases')->except([
    'edit', 'update', 'destroy'
]);
Route::resource('sales', SaleController::class)->names('sales')->except([
    'edit', 'update', 'destroy'
]);
//==========================================================================================
Route::resource('printers', PrinterController::class)->names('printers')->only([
    'index', 'update'
]);

Route::resource('business', BusinessController::class)->names('business')->only([
    'index', 'update'
]);
//==========================================================================================

Route::get('purchases/pdf/{purchase}',[PurchaseController::class, 'pdf'])->name('purchases.pdf');

Route::get('sales/pdf/{sale}',[SaleController::class, 'pdf'])->name('sales.pdf');

Route::get('sales/print/{sale}',[SaleController::class, 'print'])->name('sales.print');

//==========================================================================================
Route::get('purchases/upload/{purchase}', [PurchaseController::class, 'upload'])->name('upload.purchases');

//==========================================================================================
Route::get('change_status/products/{product}', [ProductController::class, 'change_status'])->name('change.status.products');
Route::get('change_status/purchases/{purchase}', [PurchaseController::class, 'change_status'])->name('change.status.purchases');
Route::get('change_status/sales/{sale}', [SaleController::class, 'change_status'])->name('change.status.sales');

//==================================================================================================================



//==================================================================================================================

Route::resource('users', UserController::class)->names('users');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
