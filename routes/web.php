<?php

use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('books.books');
});


Route::controller(BookController::class)->group(function () {
    Route::get('/', 'index')->name('books.index');
    Route::post('/add-book', 'addBook')->name('books.addBook');
    Route::post('/update-book', 'updateBook')->name('books.updateBook');
    Route::post('/delete-book', 'deleteBook')->name('books.deleteBook');
    Route::get('/book/search', 'search')->name('book.search');
    Route::get('/book/show/{id}', 'show')->name('book.show');


});
//
