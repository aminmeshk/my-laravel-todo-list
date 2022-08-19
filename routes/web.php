<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TodoController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/todos/create', [TodoController::class, 'create'])->name('todo.create');
Route::get('/todos/{todo}', [TodoController::class, 'show'])->name('todo.show');
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todo.update');
Route::put('/todos/{todo}/done', [TodoController::class, 'done'])->name('todo.done');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
Route::post('/todos', [TodoController::class, 'store'])->name('todo.store');
