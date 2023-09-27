<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('/response', [\App\Http\Controllers\MainController::class, "traitement"])
    ->name('traitement');

Route::get('/inscription', function (){
    return view("succes");
});

Route::get('/error1047', function (){
    return view('errors.error');
});

Route::get('/error1048', function (){
    return view('errors.errorAlreadyExist');
});

//Route::get('/test', function (){
//    return view('auth.login');
//});
//
//Route::post('/downloadBDD', [\App\Http\Controllers\MainController::class, 'downloadBDD'])->name('next');
