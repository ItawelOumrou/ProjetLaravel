<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\DiplomeController;


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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

Route::group(['middleware' => 'no-cache'],function(){
    Auth::routes();

Route::get('/etudiants',[EtudiantController::class,"index"]);
Route::get('/etudiants/ajout',[EtudiantController::class,"create"]);
Route::post('/etudiants',[EtudiantController::class,"store"]);
Route::get('/etudiants/{id}/edit',[EtudiantController::class,"edit"]);
Route::put('/etudiants/{id}',[EtudiantController::class,"update"]);
Route::delete('/etudiants/{id}',[EtudiantController::class,"destroy"]);
Route::get('/etudiants/{id}/show',[EtudiantController::class,"show"]);

Route::get('/etudDip',[EtudiantController::class,"index2"]);
Route::get('/etudDip/{id}/affiche',[EtudiantController::class,"affiche"]);

Route::get('/diplomes',[DiplomeController::class,"index"]);
Route::get('/diplomes/ajout',[DiplomeController::class,"create"]);
Route::post('/diplomes',[DiplomeController::class,"store"]);
Route::get('/diplomes/{id}/edit',[DiplomeController::class,"edit"]);
Route::put('/diplomes/{id}',[DiplomeController::class,"update"]);
Route::delete('/diplomes/{id}',[DiplomeController::class,"destroy"]);

});
