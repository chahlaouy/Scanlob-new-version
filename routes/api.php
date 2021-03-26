<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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

// Route::prefix('/api/pin')->group(function () {
//     Route::post('pin', [HomeController::class, 'pin']);
// });


Route::middleware('auth:api')->get('/user', function (Request $request) {
    
    // return $request->user();
    return "done";
});
Route::post('/pin', [HomeController::class, 'pin']);
