<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas Agente</title>
</head>

<?php
include "includes/header.php";

require "includes/config/connect-db.php";

$db = connectdb();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $seller_id = $_POST['seller_id'];

    $query = "SELECT 
    propiedades.id AS propiedad_id,
    propiedades.titulo AS titulo,
    propiedades.precio AS precio,
    propiedades.num_rooms AS habitaciones,
    propiedades.num_wc AS baños,
    propiedades.num_garage AS garages,
    propiedades.created AS fecha_creacion,
    sellers.nombre AS nombre_vendedor,
    sellers.email AS email_vendedor,
    sellers.phone AS telefono_vendedor
FROM 
    propiedades
JOIN 
    sellers ON propiedades.seller_id = sellers.id
WHERE 
    sellers.id = $seller_id;";

    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h3>Propiedades vendidas por el vendedor ID: $seller_id</h3>";
        echo "<table><tr><th>Título</th><th>Fecha de Venta</th><th>Precio</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['titulo']}</td><td>{$row['fecha_creacion']}</td><td>{$row['precio']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<br>No se encontraron propiedades vendidas para el vendedor ID: $seller_id";
    }

    if($result){
        echo "<br> Conectado";
    } else {
        echo "<br> Error Fatal";
    }
}

?>

<section>
    <h2>Create a new property Form</h2>
    <div>
        <form method = "POST" action="VentasAgente.php">
            <fieldset>
                <div>
                    <legend>Buscar propiedades vendidas por un vendedor</legend>
                </div>

                <div>
                    <label for="seller_id">ID del vendedor</label>
                    <input type="number" id="seller_id" name="seller_id">
                </div>

                <div>
                    <button type="submit" name="search">Buscar</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "includes/footer.php"
?>
</html>