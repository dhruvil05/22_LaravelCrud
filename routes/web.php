<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Peoples;
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

route::get('/register', [RegistrationController::class, 'index']);
route::post('/register', [RegistrationController::class, 'register']);

Route::get('/people', function(){
    $peoples= peoples::all();
    echo "<pre>";
    print_r($peoples);
});
  

Route::get('/home', function(){
   
    return view("home");
});
  
Route::get('/update', function(){
   
    return view("update");
});
  