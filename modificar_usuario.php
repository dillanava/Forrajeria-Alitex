<?php
include_once "conexion.php";
include_once "encrypt.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioAntiguo = $_POST["usuarioAntiguo"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $usuario = $_POST["usuario"];
    $clave = $_POST["pass"]; // Corregir el nombre del campo

    $admin_pass = $_POST["admin_pass"];

    if ($admin_pass !== "Alitex12!") {
        header("Location: login.php?modify_admin_error=1");
        exit();
    }

    $sql_check = "SELECT * FROM usuario WHERE usuario = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$usuarioAntiguo]);

    if ($stmt_check->rowCount() === 0) {
        header("Location: login.php?modify_user_not_found=1");
        exit();
    }

    $password_encrypted = null;

    // Verificar si se proporciona una nueva contraseña
    if (!empty($clave)) {
        // Encriptar la nueva contraseña
        $password_encrypted = encrypt($clave);
    }

    // Preparar la consulta SQL para modificar los datos del usuario
    $sql_update = "UPDATE usuario SET nombre = ?, apellido = ?, telefono = ?, usuario = ?";
    
    // Agregar la contraseña encriptada a la consulta si está presente
    if (!empty($password_encrypted)) {
        $sql_update .= ", clave = ?";
    }

    $sql_update .= " WHERE usuario = ?";
    
    $stmt_update = $pdo->prepare($sql_update);

    // Asignar valores a la consulta dependiendo de si se proporcionó una nueva contraseña
    if (!empty($password_encrypted)) {
        $stmt_update->execute([$nombre, $apellido, $telefono, $usuario, $password_encrypted, $usuarioAntiguo]);
    } else {
        $stmt_update->execute([$nombre, $apellido, $telefono, $usuario, $usuarioAntiguo]);
    }

    if ($stmt_update->rowCount() > 0) {
        header("Location: login.php?modify_success=1");
        exit();
    } else {
        header("Location: login.php?modify_error=1");
        exit();
    }
}
?>
