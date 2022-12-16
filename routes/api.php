<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::get('/articles',function (){
//    return 'yes!!!!!!!';
//});


Route::prefix('v1')->group(function (){
    Route::get('/articles',[\App\Http\Controllers\Api\v1\ArtcleController::class,'index']);
    Route::get('/articles/{article}',[\App\Http\Controllers\Api\v1\ArtcleController::class,'show']);
    Route::post('/articles',[\App\Http\Controllers\Api\v1\ArtcleController::class,'store']);
    Route::post('/login',[\App\Http\Controllers\Api\v1\UserController::class,'login']);
    Route::post('/register',[\App\Http\Controllers\Api\v1\UserController::class,'register']);


    Route::middleware('auth:api')->get('/user', function (Request $request) {
        $user = \Illuminate\Support\Facades\Auth::user();
        //return response()->json(5);
        return response()->json($user);
        return $request->user();
    });

});


