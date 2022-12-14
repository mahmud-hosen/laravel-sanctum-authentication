<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;

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

Route::group(['middleware' => 'auth:sanctum'], function () {

   Route::get('category/info',[CategoryController::class,'index']);
   Route::post('category/store',[CategoryController::class,'store']);

   Route::get('user/info',   [UserController::class,'userInfo']);


});


Route::post('login',[UserController::class,'login'])->name('login');

