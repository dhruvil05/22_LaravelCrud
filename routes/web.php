<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;


// Student Image CRUD
Route::group(["prefix" => "/students"], function () {
    Route::get('no-access', [StudentController::class, 'accessDenied']);

    Route::get('/', [StudentController::class, 'index'])->middleware('guard');                  // Add middleware 
    Route::get('add-student', [StudentController::class, 'create'])->middleware('guard');       // Add middleware 
    Route::post('add-student', [StudentController::class, 'store'])->middleware('guard');
    Route::get('edit-student/{id}', [StudentController::class, 'edit'])->middleware('guard');
    Route::post('update-student/{id}', [StudentController::class, 'update'])->middleware('guard');
    Route::get('delete-student/{id}', [StudentController::class, 'delete'])->middleware('guard');
    Route::get("search", [StudentController::class, 'index'])->middleware('guard');
    Route::get('set-session', [StudentController::class, 'setSession']);
    Route::get('destroy-session', [StudentController::class, 'destroySession']);
    Route::get('get-all-session', [StudentController::class, 'allSession']);
});

Route::get('/home', function () {
    // return response('Hello World', 200)
    //     ->header('Content-Type', 'text/plain');

        // return response('Hello World')->cookie(
        //     'name',
        //     'value',
        
        // );
});
// <--middleware route group method -->

    // Route::middleware(['guard'])->group(function () {
    //     Route::get('/students', [StudentController::class, 'index'])->middleware('guard');
    //     Route::get('students/add-student', [StudentController::class, 'create'])->middleware('guard');
    // });


// <--simple Route  method -->

    // Route::get('students', [StudentController::class, 'index']);
    // Route::get('students/add-student', [StudentController::class, 'create']);
    // Route::get('students/edit-student/{id}', [StudentController::class, 'edit']);
    // Route::get('get-all-session', function () {
    //     $session = session()->all();
    //     p($session);
    // });

    // Auth::routes();

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
