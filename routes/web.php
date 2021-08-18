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

Route::get('/', [\App\Http\Controllers\EmployeController::class, 'index']);
Route::get('employes', [\App\Http\Controllers\EmployeController::class, 'index'])->name('employes');
Route::get('employes/{department}', [\App\Http\Controllers\EmployeController::class, 'index'])->name('employes.department');

Route::get('set-items-on-page/{count}', [\App\Http\Controllers\SiteController::class, 'setItemsOnPage'])->name('set_items_on_page.count');

Route::fallback(function () {
    abort(404, 'Oops! Page not found');
});
