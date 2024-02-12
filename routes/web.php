<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\SuministroController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



//vista al inicio de empleado
Route::get('/empleado', function(){
    return view('empleado.index');
});
//vista al inicio de empleado
Route::get('/cliente', function(){
    return view('cliente.index');
});
//vista al inicio de empleado
Route::get('/proveedor', function(){
    return view('proveedor.index');
});
Route::get('/factura', function(){
    return view('factura.index');
});
Route::get('/suministro', function(){
    return view('suministro.index');
});


//acceso a la ruta mediante Clases
Route::get('/empleado/create', [EmpleadoController::class,'create']); 
Route::get('/cliente/create', [ClienteController::class,'create']); 
Route::get('/proveedor/create', [ProveedorController::class,'create']);
Route::get('/factura/create', [FacturaController::class,'create']);
Route::get('/suministro/create', [SuministroController::class,'create']);


Route::post('/empleado', [EmpleadoController::class, 'store']);
Route::post('/cliente', [ClienteController::class, 'store']);
Route::post('/proveedor', [ProveedorController::class, 'store']);
Route::post('/factura', [FacturaController::class, 'store']);
Route::post('/suministro', [SuministroController::class, 'store']);



//automatizar todas las rutas para acceder a todas las vistas
Route::resource('empleado',EmpleadoController::class)->middleware('auth');
Route::resource('cliente',ClienteController::class)->middleware('auth');
Route::resource('proveedor',ProveedorController::class)->middleware('auth');
Route::resource('factura',FacturaController::class)->middleware('auth');
Route::resource('suministro',SuministroController::class)->middleware('auth');



//debo cambiar a false luego
Auth::routes(['register'=>true, 'reset'=>false]);




Route::get('/home', [EmpleadoController::class, 'index'])->name('home');




Route::group(['middleware'=>'auth'], function(){
    Route::get('/home',[EmpleadoController::class, 'index'])->name('home');
});

 
