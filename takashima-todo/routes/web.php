<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlRoom;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middlewwre'=>['auth']],function(){
    route::get('/home',[HomeController::class,'index'])->name('home');
    route::get('/todos',[ControlRoom::class,'index'])->name('todos.index');
    route::get('/todos/create',[ControlRoom::class,'create'])->name('todos.create');
    route::post('/todos',[ControlRoom::class,'store'])->name('todos.store');
    route::get('/todos/{id}',[ControlRoom::class,'show'])->name('todos.show');
    route::get('/todos/{id}/edit',[ControlRoom::class,'edit'])->name('todos.edit');
    route::put('/todos/{id}',[ControlRoom::class,'update'])->name('todos.update');
    route::delete('/todos/{id}',[ControlRoom::class,'destroy'])->name('todos.destroy');
});