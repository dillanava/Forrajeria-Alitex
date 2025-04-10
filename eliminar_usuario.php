<?php
// Incluir el archivo de conexión a la base de datos y las funciones de encriptación
include_once "conexion.php";
include_once "encrypt.php";

session_start();
// Usar la variable de sesión que realmente tienes (idUsuario)
if (!isset($_SESSION["idUsuario"])) {
    header("Location: login.php");
    exit();
}

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el nombre de usuario a eliminar y la contraseña de administrador
    // Cambiar "id_usuario" por "usuario" para que coincida con el formulario
    $usuario = $_POST["usuario"];
    $admin_pass = $_POST["admin_pass"];

    // Verificar la contraseña de administrador (se compara de forma literal)
    if ($admin_pass !== "Alitex12!") {
        header("Location: modulos.php?delete_admin_error=1");
        exit();
    }

    // Preparar la consulta SQL para verificar si el usuario existe
    $sql_check = "SELECT * FROM usuario WHERE usuario = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$usuario]);
    
    if ($stmt_check->rowCount() === 0) {
        header("Location: modulos.php?delete_user_not_found=1");
        exit();
    }

    // Preparar la consulta SQL para eliminar el usuario por su nombre
    $sql_delete = "DELETE FROM usuario WHERE usuario = ?";
    $stmt_delete = $pdo->prepare($sql_delete);

    // Ejecutar la consulta
    if ($stmt_delete->execute([$usuario])) {
        header("Location: modulos.php?delete_success=1");
        exit();
    } else {
        header("Location: modulos.php?delete_error=1");
        exit();
    }
}
?>
