<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('proprietaires', 'ProprietaireController');
Route::resource('/vehicules', 'VehiculeController');
Route::resource('/paiements', 'PaiementController');


Route::get('/generate-pdf',[App\Http\Controllers\PDFController::class , 'generatePDF']);  


Route::get('/myPDF', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('myPDF');


