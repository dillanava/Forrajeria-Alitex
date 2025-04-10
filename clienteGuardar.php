<?php
include_once "funciones.php";

if (isset($_POST["apellido"]) && isset($_POST["nombre"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["direccion"]) && isset($_POST["localidad"]) && isset($_POST["estado"])) { // Se verifica si el campo de estado está establecido
    // Llamar a la función para insertar el cliente con los nuevos campos, incluyendo el estado
    insertarCliente($_POST["apellido"], $_POST["nombre"], $_POST["telefono"], $_POST["email"], $_POST["direccion"], $_POST["localidad"], $_POST["estado"]);
    
    if (isset($_POST["volver"])) {
        header("Location: ventaPreparacion.php");
    } else {
        header("Location: clienteCargar.php");
    }
} else {
    header("Location: clienteCargar.php");
}
?>

