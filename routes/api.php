<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Sermon;

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

// ROUTE TO CONTROLLER
Route::resource('sermons', 'App\Http\Controllers\SermonController');

Route::get('/test', function () {
    return ['message' => 'oi'];
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
