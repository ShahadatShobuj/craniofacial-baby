<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Route::resource('user', UserController::class);
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('roles', [App\Http\Controllers\RoleController::class, 'roles'])->name('roles.index');

	Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
	Route::put('profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('change-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('password.change');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/cleft_baby/{cleft_baby}/show', [App\Http\Controllers\CraniofacialCleftBabyController::class, 'craniofacial_baby_show'])->name('cleft_baby_show');
    Route::post('/cleft_baby', [App\Http\Controllers\CraniofacialCleftBabyController::class, 'craniofacial_baby'])->name('cleft_baby.get');
    Route::get('/research-data', [App\Http\Controllers\CraniofacialCleftBabyController::class, 'craniofacial_babies'])->name('research-data');
    Route::get('/research-data/get', [App\Http\Controllers\CraniofacialCleftBabyController::class, 'craniofacial_babies_data'])->name('get.research-data');
    Route::get('/research-data/collect', [App\Http\Controllers\CraniofacialCleftBabyController::class, 'research_form'])->name('research-data.collect');
    Route::post('/research-data/collect', [App\Http\Controllers\CraniofacialCleftBabyController::class, 'save'])->name('research-data.save');
    Route::post('validate/email', [App\Http\Controllers\CraniofacialCleftBabyController::class, 'checkEmail'])->name('validate.email');
});
