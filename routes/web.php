<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

Route::middleware(["auth"])->group(function () {

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/lavora_con_noi', [RevisorController::class, 'workWithUs'])->name('workWithUs');
});


Route::get('/all/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/detail/product/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/products/category/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');
Route::get('/chisiamo', [PublicController::class, 'chiSiamo'])->name('chiSiamo');

//? Home per revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//? Accetta Annuncio
Route::patch('accetta/annuncio/{product}', [RevisorController::class, 'acceptProduct'])->middleware('isRevisor')->name('revisor.accept_product');

//? Rifiuta Annuncio
Route::patch('rifiuta/annuncio/{product}', [RevisorController::class, 'rejectProduct'])->middleware('isRevisor')->name('revisor.reject_product');
//? Diventa revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
//? Rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//? Ricerca
Route::get('/ricerca/prodotto', [PublicController::class, 'searchProducts'])->name('products.search');


//? Annulla modifica revisore
Route::get('/revisor/undo', [RevisorController::class, 'undo'])->name('revisor_undo');

//? Cambio lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');
