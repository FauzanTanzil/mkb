<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfilController;


Route::get('/',[BerandaController::class,'beranda']);
Route::get('about',[BerandaController::class,'about']);
Route::get('menu',[BerandaController::class,'menu']);
Route::get('login',[LoginController::class,'index']);
Route::get('register',[LoginController::class,'register']);
Route::get('logout',[LoginController::class,'logout']);
Route::post('login',[LoginController::class,'login']);
Route::post('register',[LoginController::class,'create']);
Route::get('reset-password',[LoginController::class,'reset_password']);
Route::post('reset-password',[LoginController::class,'send_reset_password']);
Route::get('reset-password/{token}', [LoginController::class, 'show_reset_password']);
Route::post('update-reset-password', [LoginController::class, 'update_reset_password']);


Route::middleware(['role:admin,user'])->group(function () {
    Route::get('pesanan',[PesananController::class,'index']);
    Route::get('pesanan/hapus/{id}',[PesananController::class,'hapus']);
    Route::get('pesanan/terima/{id}',[PesananController::class,'pembayaran_terima']);
     Route::get('pesanan/tolak/{id}',[PesananController::class,'pembayaran_tolak']);

    Route::get('profil',[ProfilController::class,'index']);
    Route::post('profil',[ProfilController::class,'update']);
});

Route::middleware(['role:admin'])->group(function () {
    Route::post('menu/add',[AdminMenuController::class,'add']);
    Route::post('menu/edit/{id}',[AdminMenuController::class,'edit']);
    Route::get('menu/hapus/{id}',[AdminMenuController::class,'hapus']);
});

Route::middleware(['role:user'])->group(function () {
    Route::get('keranjang',[KeranjangController::class,'index']);
    Route::post('keranjang/proses',[KeranjangController::class,'proses']);
    Route::get('menu/addkeranjang/{id}',[KeranjangController::class,'add']);
    Route::get('menu/hapuskeranjang/{id}',[KeranjangController::class,'hapus']);
    Route::get('pesanan/{id}',[PesananController::class,'pembayaran']);
    Route::get('pesanan/diterima/{id}',[PesananController::class,'pesanan_diterima']);
    Route::post('submitpembayaran/{id}',[PesananController::class,'submit_pembayaran']);
});