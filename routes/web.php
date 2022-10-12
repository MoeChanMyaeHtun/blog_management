<?php




use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::post('/categories/edit/{id}',[CategoriesController::class, 'update'])->name('categories.update');

//profile

Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::get('/profile/edit/{id}',[ProfileController::class,'edit'])->name('profile.edit');
Route::post('/profile/edit/{id}',[ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile/delete/{id}',[ProfileController::class, 'delete'])->name('profile.delete');
