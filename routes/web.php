<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;



// Student Image CRUD

Route:: get('students', [StudentController::class, 'index']);

Route:: get('add-student', [StudentController::class, 'create']);

Route:: post('add-student', [StudentController::class, 'store']);

Route:: get('edit-student/{id}', [StudentController::class, 'edit']);

Route:: PUT('update-student/{id}', [StudentController::class, 'update']);

Route:: get('delete-student/{id}', [StudentController::class, 'delete']);