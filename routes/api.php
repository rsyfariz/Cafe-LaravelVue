<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\MejaController;
use App\http\Controllers\MenuController;
use App\http\Controllers\UserController;
use App\http\Controllers\TransaksiController;
use App\http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getMenu',[Menucontroller::class,'getMenu']);
Route::get('/getMenu/{id_menu}',[Menucontroller::class,'getsemuamenu']);
Route::post('/createMenu',[MenuController::class , 'createMenu']);
Route::put('/updateMenu/{id_menu}',[MenuController::class , 'updateMenu']);
Route::post('/updategambar/{id}',[MenuController::class, 'updategambar']);
Route::delete('/deleteMenu/{id_menu}',[MenuController::class , 'deleteMenu']);

Route::get('/getMeja',[Mejacontroller::class,'getMeja']);
Route::get('/getmejakosong',[Mejacontroller::class,'getmejakosong']);
Route::get('/getMeja/{id_meja}',[Mejacontroller::class,'getsemuameja']);
Route::post('/createMeja',[MejaController::class , 'createMeja']);
Route::put('/updateMeja/{id_meja}',[MejaController::class , 'updatemeja']);
Route::delete('/deleteMeja/{id_meja}',[MejaController::class , 'deletemeja']);

Route::get('/getUser',[Usercontroller::class,'getUser']);
Route::get('/getUser/{id_user}',[Usercontroller::class,'getsemuauser']);
Route::post('/createUser',[UserController::class , 'createUser']);
Route::put('/updateUser/{id_user}',[UserController::class , 'updateUser']);
Route::delete('/deleteUser/{id_user}',[UserController::class , 'deleteuser']);
Route::get('/getkasir',[UserController::class , 'getkasir']);

Route::get('/gethistory',[TransaksiController::class, 'gethistory']);
Route::get('/gethistory/{code}',[TransaksiController::class, 'selecthistory']);
 
 Route::get('/tampil',[TransaksiController::class, 'tampil']);
 Route::get('/get_ongoing_transaksi/{id}',[TransaksiController::class, 'getongoingtransaksi']);
 Route::get('/gettotalharga/{id}',[TransaksiController::class, 'totalharga']);
 Route::get('/getcart',[TransaksiController::class, 'getcart']);
 Route::get('/getongoing',[TransaksiController::class, 'ongoing']);
 Route::put('/checkout',[TransaksiController::class, 'checkout']);
 Route::put('/transaksi_done/{id}',[TransaksiController::class, 'transaksidone']);
 Route::get('/gettransaksi/{id}',[TransaksiController::class, 'selecttransaksi']);
 Route::post('/createtransaksi',[TransaksiController::class, 'createtransaksi']);

 Route::delete('/deletetransaksi/{id}',[TransaksiController::class, 'deletetransaksi']);


 Route::get('/gettgl/{date}',[TransaksiController::class, 'gettgl']);
 Route::get('/getbulan/{month}',[TransaksiController::class, 'getbulan']);
 Route::get('/gettotal/{code}',[TransaksiController::class, 'total']);

 Route::post('/login',[AuthController::class, 'login']);
