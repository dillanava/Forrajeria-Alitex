<?php
session_start();
include_once "funciones.php";

// Verificar si los parámetros están presentes y son válidos
if (isset($_POST["id_articulo"]) && isset($_POST["cant_art"])) {
    $idArticulo = $_POST["id_articulo"];
    $cantidad = $_POST["cant_art"];

    if ($cantidad >= 1) {
        // Agrega el producto al pedido
        agregarProductoAlPedido($idArticulo, $cantidad);
        // Actualiza el stock: suma la cantidad pedida al stock actual
        actualizarStockPedido($idArticulo, $cantidad);
        // Redirige a la página de pedido
        header("Location: pedido.php");
        exit();
    } else {
        // Si la cantidad es menor que 1, mostrar un mensaje de error
        echo "Cantidad no válida. Debe ser mayor o igual a 1.";
    }
} else {
    // Si no se enviaron los parámetros necesarios, mostrar un mensaje de error
    echo "No hay id_articulo o cantidad especificada.";
}


// Incluir manejo de errores
function errorHandler($errno, $errstr, $errfile, $errline) {
    echo "Error [$errno]: $errstr en $errfile en la línea $errline";
    exit();
}

set_error_handler("errorHandler");
?>
