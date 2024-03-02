<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("ssr", function () {
    return [
        'status'  => true,
        'message' => "This api is called from the Nuxt SSR service.",
        'users'    => \App\Models\User::get()
    ];
});

Route::get("non-ssr", function () {
    return [
        'status'  => true,
        'message' => "This api is called from the Nuxt Non-SSR service.",
        'users'    => \App\Models\User::get()
    ];
});

Route::get("run-migrations", function () {
   \Illuminate\Support\Facades\Artisan::call('migrate');
   \Illuminate\Support\Facades\Artisan::call('db:seed');

    return [
        'status' => true,
        'message' => "Migrations ran successfully."
    ];
});
