<?php

use App\Http\Controllers\PasteController;
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
Auth::routes();

Route::get('/', [PasteController::class, 'create'])->name('create');
Route::post('/', [PasteController::class, 'store'])->name('store');
Route::get('/{paste}', [PasteController::class, 'paste'])->name('paste');
Route::get('/link/{link}', [PasteController::class, 'linkedPaste'])->name('linked-paste');

//Route::middleware(['auth:web'])->group( function () {
//    Route::prefix('/paste/{paste}')->group( function () {
//        Route::put('/', 'PasteController@update');
//        Route::delete('/', 'PasteController@delete');
//    });
//});
