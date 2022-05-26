<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;


// Student Image CRUD

Route::get('students', [StudentController::class, 'index']);

Route::get('student/add-student', [StudentController::class, 'create']);

Route::post('add-student', [StudentController::class, 'store']);

Route::get('student/edit-student/{id}', [StudentController::class, 'edit']);

Route::post('update-student/{id}', [StudentController::class, 'update']);

Route::get('trash-student/{id}', [StudentController::class, 'trash']);

Route::get('trash/force-delete/{id}', [StudentController::class, 'forceDelete']);

Route::get('trash/restore/{id}', [StudentController::class, 'restore']);

Route::get('students/trash', [StudentController::class, 'trashView']);


// Route::get("/search", [StudentController::class, 'index']);


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
