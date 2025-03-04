<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\UserAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get("/students",[StudentController::class,'list']);
    Route::post('add/student',[StudentController::class,'addStudent']);
    Route::put('update/student/',[StudentController::class,'updateStudent']);
    Route::get('edit/student/{id}',[StudentController::class,'editStudent']);
    Route::delete('delete/student/{id}',[StudentController::class,'deleteStudent']);
});


Route::post('/signup',[UserAuthController::class,'signUp']);
Route::post('/login',[UserAuthController::class,'login']);