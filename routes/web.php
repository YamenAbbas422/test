<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use GuzzleHttp\Middleware;

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

//Start Dashboard
// Route::get('/', function () {
//     return view('dashboard.index');
// });
Route::get('/', [UserController::class, 'index']);
//
Auth::routes(['login'=>false]);
Route::get('pageverify', [UsersController::class, 'pageverify'])->name('user.pageverify');
Route::post('account/verify', [UsersController::class, 'verifyAccount'])->name('user.verify');
Route::post('/resetPassword', [UsersController::class, 'resetPassword']);


Route::get('/showlogin', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('/loginto', [LoginController::class, 'loginto']);

Route::get('/register',[UsersController::class,'showRegistrationForm']);
Route::post('/registerto', [RegisterController::class, 'registerto']);


Route::group(['middeleware'=>['auth','users']],function (){
//Users
Route::get('/users', [UserController::class, 'users']);
Route::post('/createuser', [UserController::class, 'createuser']);
Route::post('/edituser/{id}', [UserController::class, 'edituser']);
Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser']);

//products
Route::get('/products', [ProductController::class, 'products']);
Route::post('/createproduct', [ProductController::class, 'createproduct']);
Route::post('/editproduct/{id}', [ProductController::class, 'editproduct']);
Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct']);

// User Product
Route::get('/showproduct/{id}', [UserController::class, 'showproduct']);

//End Dashboard
});