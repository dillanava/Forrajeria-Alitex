<?php
session_start();
include_once "funciones.php";
include_once "encrypt.php";

if (!isset($_POST["usuario"]) || !isset($_POST["pass"])) {
    exit("Usuario o clave no registrados correctamente");
} else {
    $user = $_POST["usuario"];
    $pass = $_POST["pass"];



    $usuarios = usuario();
    $usuarioEncontrado = false;

    foreach ($usuarios as $u) {
        if ($u->usuario == $user) {
            $decryptedPassword = decrypt($u->clave);
            if ($decryptedPassword && $decryptedPassword === $pass) {
                $usuarioEncontrado = true;
                $_SESSION["idUsuario"] = $u->id_usuario;
                header("Location: login.php?success=true");
                exit(); // Detener la ejecución del script después de redirigir
            }
        }
    }

    if (!$usuarioEncontrado) {
        header("Location: login.php?error=true");
        exit(); // Detener la ejecución del script después de redirigir
    }
}
?>
