<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as UserMainController;
use App\Http\Controllers\WarehouseController as WarehouseController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\SupplierController as SupplierController;
use App\Http\Controllers\ProductController as ProductController;
use App\Http\Controllers\StockController as StockController;

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

Route::get('/admin',function(){
    return view('admin/login');
});
Route::get('/admin-forget',function(){
    return view('admin/forget_password');
});


Route::post('/adminlogin',[UserMainController::class,'login']);
Route::post('/adminlogout',[UserMainController::class,'logout']);

Route::get('/warehouses',[WarehouseController::class,'list']);
Route::post('/newWarehouse',[WarehouseController::class,'create']);

Route::get('/categories',[CategoryController::class,'index']);
Route::get('/statutCategory/{id}',[ProductController::class,'updateStatut']);
Route::post('/addCategory',[CategoryController::class,'store']);

Route::get('/products',[ProductController::class,'index']);
Route::get('/newProduct',[ProductController::class,'create']);
Route::get('/statutProduct/{id}',[ProductController::class,'updateStatut']);
Route::post('/addProduct',[ProductController::class,'store']);

Route::get('/suppliers',[SupplierController::class,'index']);
Route::get('/newSupplier',[SupplierController::class,'create']);
Route::post('/addSupplier',[SupplierController::class,'store']);

Route::get('/stocks',[StockController::class,'index']);
Route::get('/newStock',[StockController::class,'create']);
Route::post('/addStock',[StockController::class,'store']);


Route::get('/layout',function(){
    return view('admin/categories');
}); 

