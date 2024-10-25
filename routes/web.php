<?php

use App\Http\Controllers\pegawai_controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[pegawai_controller::class,'index'])->name('pegawai');


Route::get('/tambah-pegawai',[pegawai_controller::class,'tambah_data']);
Route::post('/proses-tambah',[pegawai_controller::class,'proses_tambah'])->name('tambah.pegawai');
Route::get('/edit-pegawai/{id}', [Pegawai_Controller::class, 'form_edit'])->name('edit_pegawai');
Route::post('/update-pegawai/{id}', [Pegawai_Controller::class, 'update'])->name('update_pegawai');
Route::delete('/pegawai/{id}/delete', [Pegawai_Controller::class, 'destroy'])->name('delete_pegawai');

