<?php




use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\AdminAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// category
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/create',[CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories/create',[CategoriesController::class, 'store'])->name('categories.store');
Route::delete('/categories/delete/{id}',[CategoriesController::class, 'delete'])->name('categories.delete');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::post('/categories/edit/{id}',[CategoriesController::class, 'update'])->name('categories.update');

//profile

Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::get('/profile/edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
Route::post('/profile/edit/{id}',[ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile/delete/{id}',[ProfileController::class, 'delete'])->name('profile.delete');


//products

Route::get('/products',[ProductsController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
Route::post('/products/create',[ProductsController::class,'store'])->name('products.store');
Route::get('/products/show/{id}',[ProductsController::class, 'show'])->name('products.show');
Route::get('/products/edit/{id}',[ProductsController::class,'edit'])->name('products.edit');
Route::post('/products/edit/{id}',[ProductsController::class,'update'])->name('products.update');
Route::delete('/products/delete/{id}',[ProductsController::class, 'delete'])->name('products.delete');
Route::get('products/mail', [ProductController::class, 'index']);

//admin
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');



