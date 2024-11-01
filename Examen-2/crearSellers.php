<?php
include "includes/header.php";
require "includes/config/connect-db.php";

    $db = connectdb();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    }

    $query = "INSERT INTO sellers (nombre,email,phone) VALUES('$name','$email','$phone')";
    $result = mysqli_query($db, $query);

    if($result){
        echo "<br> Seller creado correctamente";
    } else {
        echo "<br> Error al crear el Seller";
    }  
?>

<section>
    <h2>Crear Selller Form</h2>
    <div>
        <form method = "POST" action="crearSellers.php">
            <fieldset>
                <div>
                    <legend>Fill all form fields to create a new seller.</legend>
                </div>

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>
            
            <div>
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone">
            </div>

            <div>
                <button type="submit">Create a new seller</button>
            </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "includes/footer.php"
?>