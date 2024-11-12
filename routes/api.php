<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CategoryController;


//Rotas das Categorias
Route::apiResource('categories', CategoryController::class);
