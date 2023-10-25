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
    return view('welcome');
});

Route::get('/exam/{exam}/import-mark', [\App\Http\Controllers\ExamController::class, 'importMark'])->name('exam.import-mark');
Route::get('/exam/{exam}/edit-mark', [\App\Http\Controllers\ExamController::class, 'editMark'])->name('exam.edit-mark');
Route::post('/exam/{exam}/update-mark', [\App\Http\Controllers\ExamController::class, 'updateMark'])->name('exam.update-mark');

Route::resource('/complaint', \App\Http\Controllers\ComplaintController::class);
Route::resource('/application', \App\Http\Controllers\ApplicationController::class);
Route::resource('/exam', \App\Http\Controllers\ExamController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
