<?php
include_once("funciones.php");
session_start(); // Asegúrate de iniciar la sesión

if (isset($_POST['cant_art']) && isset($_POST['id_producto'])) {
    $id = $_POST["id_producto"];
    $cantidad = $_POST["cant_art"];
    
    $var = FALSE;
    foreach ($_SESSION["carrito"] as list($a, $b)) {
        if ($a == $id) {
            $var = TRUE;
            break;
        }
    }
    if (!$var) {
        array_push($_SESSION['carrito'], array($id, $cantidad));
    }

    if ($_POST["flex"] == "flex") {
        header('Location: app-flex.php');
    } else {
        header('Location: app.php');
    }
    exit(); // Asegúrate de que el script se detenga después de la redirección
} else {
    header('Location: app.php');
    exit(); // Asegúrate de que el script se detenga después de la redirección
}
?>
