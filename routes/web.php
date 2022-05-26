<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;


// Student Image CRUD

Route::get('students', [StudentController::class, 'index']);

Route::get('add-student', [StudentController::class, 'create']);

Route::post('add-student', [StudentController::class, 'store']);

Route::get('edit-student/{id}', [StudentController::class, 'edit']);

Route::post('update-student/{id}', [StudentController::class, 'update']);

Route::get('delete-student/{id}', [StudentController::class, 'delete']);

Route::get("/search", [StudentController::class, 'index']);


Route::get('get-all-session', function () {
    $session = session()->all();
    p($session);
});
Route::get('set-session', function (Request $request) {
    $request->session()->put('nav', 'CRUD'); 
    $request->session()->put('id', '123');
    return redirect('get-all-session');
});
Route::get('destroy-session', function () {
    session()->forget(['nav', 'id']);
    // session()->forget('user_id');
    return redirect('get-all-session');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
