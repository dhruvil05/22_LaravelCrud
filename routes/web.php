<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;


// Student Image CRUD
Route::group(["prefix" => "/students"], function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('add-student', [StudentController::class, 'create']);
    Route::post('add-student', [StudentController::class, 'store']);
    Route::get('edit-student/{id}', [StudentController::class, 'edit']);
    Route::post('update-student/{id}', [StudentController::class, 'update']);
    Route::get('delete-student/{id}', [StudentController::class, 'delete']);
    Route::get("search", [StudentController::class, 'index']);
    Route::get('set-session', [StudentController::class, 'setSession']);
    Route::get('destroy-session',[StudentController::class, 'destroySession']);
    Route::get('get-all-session',[StudentController::class, 'allSession']);
});

// Route::get('students', [StudentController::class, 'index']);
// Route::get('students/add-student', [StudentController::class, 'create']);
// Route::get('students/edit-student/{id}', [StudentController::class, 'edit']);





// Route::get('get-all-session', function () {
//     $session = session()->all();
//     p($session);
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
