@extends('layouts.app')
@section('content')
    <h1>FORMULARIO PARA CREAR UN NUEVO PRODUCTO</h1>
    <form action="" method = "post">
        <label for="nombre">Name:</label>
        <input type="text" name="nombre">
        <br>
        <label for="description">Description:</label>
        <textarea name="descrption" cols="30" rows="10">
        </textarea>
        <br>
        <label for="price">Price:</label>
        <input type="number" name="precio">
        <br>
        <label for="image">Image:</label>
        <input type="file" name="img">
        <br>
        <label for="brand">Brand:</label>
        <input type="text" name="brand">
    </form>
@endsection
