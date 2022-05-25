<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SampleController;
use App\Models\Product;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\API'

], function ($router) {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});

//users
Route::get('users/{id}', [UserController::class, 'user']);
Route::post('update/{id}', [UserController::class, 'update']);
Route::post('changepassword/{id}', [UserController::class, 'changepassword']);

//products
Route::post('addproduct', [ProductController::class, 'addproduct']);
Route::post('editproduct/{id}', [ProductController::class, 'editproduct']);
Route::post('deleteproduct/{id}', [ProductController::class, 'deleteproduct']);
Route::get('getproduct', [ProductController::class, 'getproduct']);
Route::get('userProduct/{user_id}', [ProductController::class, 'userProduct']);

//send mail
Route::post('/forgetPassword',[UserController::class,'forgot']);

