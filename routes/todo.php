<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::middleware('auth')->group(function () {
    Route::get('todos/create', [TodoController::class, 'create'])->name('todo.create');
    Route::get('todos/{todo}', [TodoController::class, 'show'])->name('todo.show');
    Route::get('todos/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::put('todos/{todo}', [TodoController::class, 'update'])->name('todo.update');
    Route::put('todos/{todo}/done', [TodoController::class, 'done'])->name('todo.done');
    Route::delete('todos/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::post('todos', [TodoController::class, 'store'])->name('todo.store');
});
