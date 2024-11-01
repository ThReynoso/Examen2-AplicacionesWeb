<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Propiedades</title>
</head>

<?php
include "includes/header.php";
require "includes/config/connect-db.php";

$db = connectdb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$titulo = $_POST ['titulo'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];
$descripcion = $_POST['descripcion'];
$num_rooms = $_POST ['num_rooms'];
$num_wc = $_POST['num_wc'];
$num_garage = $_POST ['num_garage'];
$created = date('Y-m-d');
$seller_id = $_POST ['Seller_id'];


$query = "INSERT INTO propiedades (titulo, precio, imagen, description, num_rooms, num_wc, num_garage, created, seller_id) VALUES 
('$titulo', '$precio', '$imagen', '$descripcion', '$num_rooms', '$num_wc', '$num_garage', '$created', '$seller_id')";

$result = mysqli_query($db, $query);

if($result){
    echo "<br> Propiedad creada correctamente";
} else {
    echo "<br> Error al crear la propiedad";
}
}
?>

<section>
    <h2>Create a new property Form</h2>
    <div>
        <form method = "POST" action="crearPropiedades.php">
            <fieldset>
                <div>
                    <legend>Fill all form fields to create a new seller.</legend>
                </div>

                <div>
                    <label for="titulo">Nombre de la propiedad</label>
                    <input type="text" id="titulo" name="titulo">
                </div>
                
                <div>
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" step="0.01">
                </div>
                
                <div>
                    <label for="imagen">Imagen</label>
                    <input type="text" id="imagen" name="imagen">
                </div>

                <div>
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" required></textarea>
                </div>
                
                <div>
                    <label for="num_rooms">Numero de habitaciones</label>
                    <input type="number" id="num_rooms" name="num_rooms">
                </div>
                
                <div>
                    <label for="num_wc">Numero de baños</label>
                    <input type="number" id="num_wc" name="num_wc">
                </div>
                
                <div>
                    <label for="num_garage">Numero de garages</label>
                    <input type="number" id="num_garage" name="num_garage">
                </div>
                
                <div>
                    <label for="created">Creado</label>
                    <input type="date" id="created" name="created">
                </div>

                <div>
                    <label for="Seller_id">ID seller</label>
                    <input type="number" id="Seller_id" name="Seller_id">
                </div>

                <div>
                    <button type="submit">Create a new property</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>
