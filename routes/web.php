<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;

Route::get('/', [todoController::class,'index'])->name('allusers');
Route::get('/CreateUser', function () {
    return view('createuser');
})->name('createuser');
Route::post('/CreateUser', [todoController::class, 'store'])->name('storeuser');
Route::get('/showuser/{id}', [todoController::class, 'show'])->name('showuser');
Route::patch('/todos/{todo}/toggle', [todoController::class, 'toggle'])->name('todos.toggle');
Route::delete('/todos/{todo}',[todoController::class, 'destroy'])->name('todo.destroy');
Route::post('/showuser/{id}',[todoController::class, 'storetask'])->name('storetask');
Route::delete('/{id}',[todoController::class,'deleteuser'])->name('deleteuser');
Route::delete('showuser/{id}',[todoController::class,'deleteuser'])->name('deleteuserprime');