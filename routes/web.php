<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

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
Route::get('logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// category
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/create',[CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories/create',[CategoriesController::class, 'store'])->name('categories.store');
Route::delete('/categories/delete/{id}',[CategoriesController::class, 'delete'])->name('categories.delete');
Route::get('/categories/show/{id}',[CategoriesController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
