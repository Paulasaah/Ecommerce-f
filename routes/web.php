<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('products', function () {
    return "LISTADO DE PRODUCTOS";
});
Route::get('products/create', function () {
    return "FORMULARIO DE CREACION DE PRODUCTOS";
});
Route::get('products/{id}/{category?}', function ($id, $category) {
    return "Detalle de cada producto" . $id . "de la categoria" . $category;
});
