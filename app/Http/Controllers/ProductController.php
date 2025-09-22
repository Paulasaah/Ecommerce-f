<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(Request $request){
        return "LISTADO DE PRODUCTOS";
    }
    function create(){
        return "FORMULARIO DE PRODUCTOS";
    }
    function show($id, $category =  null)
    {
        if ($category == null) {
            return "Detalle de cada producto: " . $id;
        } else {
            return "Detalle de cada producto:" . $id . "de la categoria". $category;
        }
    }
}
