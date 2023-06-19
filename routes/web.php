<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\NotificationController;

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

Route::get('/dashboard',[VacancyController::class,'index'])->middleware(['auth', 'verified'])->name('vacancies.index');
Route::get('/vacancies/create',[VacancyController::class,'create'])->middleware(['auth', 'verified'])->name('vacancies.create');
Route::get('/vacancies/{vacancy}/edit',[VacancyController::class,'edit'])->middleware(['auth', 'verified'])->name('vacancies.edit');
Route::get('/vacancies/{vacancy}',[VacancyController::class,'show'])->name('vacancies.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//notifications
Route::get('/notifications',NotificationController::class)->name('notifications');

require __DIR__.'/auth.php';
