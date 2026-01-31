<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/create', [CategoriaController::class, 'create']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit']);
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy']);


Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');

Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);

Route::get('/', function () {
    return redirect()->route('produtos.index');
});
