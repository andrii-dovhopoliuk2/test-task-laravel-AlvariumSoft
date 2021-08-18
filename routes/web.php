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

Route::get('employes',  [\App\Http\Controllers\EmployeController::class, 'index'])->name('employes');
Route::get('employes/{department}',  [\App\Http\Controllers\EmployeController::class, 'index'])->name('employes.department');
Route::get('/',  [\App\Http\Controllers\EmployeController::class, 'index']);
