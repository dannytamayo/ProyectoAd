<?php

use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
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

//     return view('administrador');
// })->name('admin');

Route::get('/', [TravelController::class, 'index'])->name('admin');
Route::put('asignar', [TravelController::class, 'update'])->name('admin.update');


// Route::get('/crud', function () {
//     return view('crud');
// })->name('crud');

Route::resource('users', UserController::class)->names('admin.users');