<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
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

Route::get('/test', function () {
    return request()->cookie('categories');
});
Route::middleware('auth')->group(function () {
    Route::post('apply-job', JobApplicationController::class);
    Route::get('my-applications',[ApplicationController::class,'index']);
});




require __DIR__.'/auth.php';
