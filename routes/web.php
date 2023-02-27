<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TagController;

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

Route::get('/', [TodoController::class, 'index']);
Route::post('/add', [TodoController::class, 'create']);
Route::post('/modify', [TodoController::class, 'modify']);
Route::post('/delete', [TodoController::class, 'delete']);
Route::get('/find', [TodoController::class, 'find']);
Route::post('/search', [TodoController::class, 'search']);
// Route::get('/logout', function (){ return view('auth.register'); });
Route::get('/relation', [TodoController::class, 'relate']);

Route::get('/dashboard', [TodoController::class, 'dashboard']);
// function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
