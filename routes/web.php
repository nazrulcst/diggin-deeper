<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Events\UserProfileViewNotify;

use App\Events\TaskEvent;

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


Route::get('/event',function(){
    //return "Hello.";
    $data = ['name'=>'nazrul islam','email'=>'nazrulcst@gmail.com'];
    return event(new UserProfileViewNotify($data));
});
