<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Student\ProfileController;
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



Route::get('/', HomeController::class)->name('home');
Route::get('jobs', [JobController::class,'index'])->name('guest.jobs');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('guest.jobs.show');


Route::middleware('auth')->group(function () {
    Route::post('apply-job', JobApplicationController::class);
    Route::get('my-applications',[ApplicationController::class,'index']);
    Route::get("my-profile",[ProfileController::class,'edit']);
    Route::post("my-profile",[ProfileController::class,'store']);
    Route::get("change-password",[PasswordController::class,'edit']);
    Route::post("change-password",[PasswordController::class,'update']);
});




require __DIR__.'/auth.php';
