<?php

use App\Http\Controllers\ImageController;
use GrahamCampbell\ResultType\Success;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/check', function (Request $request) {
    return response()->json(['success' => true], 200);
});

Route::prefix('/v1')->group(function () {
    Route::get('/images', [ImageController::class, 'fetch']);
    Route::post('/images', [ImageController::class, 'store']);
    Route::delete('/images/{imageId}', [ImageController::class, 'destroy']);
});
