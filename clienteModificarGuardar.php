<?php 
include_once "funciones.php";

if(isset($_POST["apellido"]) && isset($_POST["nombre"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["direccion"]) && isset($_POST["localidad"]) && isset($_POST["estado"])) { // Se verifica si el campo de estado está establecido
    modificarCliente($_POST["cliente"], $_POST["apellido"], $_POST["nombre"], $_POST["telefono"], $_POST["email"], $_POST["direccion"], $_POST["localidad"], $_POST["estado"]); // Se agrega el parámetro del estado
    header("Location: clienteModificar.php");
} else {
    header("Location: clienteModificar.php");
}
?>
