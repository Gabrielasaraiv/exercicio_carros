<?php

use App\Http\Controllers\CarrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('carros', [CarrosController::class, 'store']);

Route::get('listagem', [CarrosController::class, 'getAll']);

Route::get('carro/{id}/find', [CarrosController::class, 'findById']);

Route::get('carro/{placa}/search', [CarrosController::class, 'searchPlaca']);

Route::get('carro/{ano}/searchano', [CarrosController::class, 'searchAno']);

Route::get('carro/{tipo}/searchtipo', [CarrosController::class, 'searchTipo']);

Route::get('carro/{marca}/searchmarca', [CarrosController::class, 'searchMarca']);

Route::get('carro/{modelo}/searchmodelo', [CarrosController::class, 'searchModelo']);

Route::get('carro/{valor}/searchvalor', [CarrosController::class, 'searchValor']);

Route::put('update', [CarrosController::class, 'update']);

Route::delete('delete/{id}', [CarrosController::class, 'delete']);