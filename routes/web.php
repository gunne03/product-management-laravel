<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController; 



Route::get('/', [CrudController::class, 'viewItem'])->name('view');
Route::get('add.form', [CrudController::class, 'addForm'])->name('add.form');
Route::post('add-item', [CrudController::class, 'addItem'])->name('add.item');

Route::get('product/{id}/edit', [CrudController::class, 'editForm'])->name('edit.form');
Route::put('product/{id}/update', [CrudController::class, 'updateProduct'])->name('update.product');
Route::delete('product/{id}/delete', [CrudController::class, 'deleteProduct'])->name('delete.product');