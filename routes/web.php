<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

//create user using artisan command
Route::get('/create-user-with-artisan-command', function () {
    Artisan::call('user:create');
});



Route::get('/',function(){
    return view('welcome');
});
