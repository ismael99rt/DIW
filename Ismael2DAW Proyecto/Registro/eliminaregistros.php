<?php

include('conexiones.php');



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['enviar'])) {
    if (!empty($_POST['tenis'])) {
        // Contando el numero de input seleccionados "checked" checkboxes.
        $checked_contador = count($_POST['tenis']);
        // Bucle para almacenar y visualizar valores activados checkbox.
        foreach ($_POST['tenis'] as $seleccion) {
            mysqli_query($conn,"DELETE FROM productos WHERE idProducto='$seleccion'");
            echo "Registro borrado realizado con éxito";
            echo ("<br>");

        }
        
    }
}
?>
<a href="sesionAdmin.php"> <input type="submit" value="Volver a la gestión del admin"></a>
