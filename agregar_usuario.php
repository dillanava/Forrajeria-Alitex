<?php
include_once "conexion.php";
include_once "encrypt.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $telefono = $_POST["telefono"];
    $admin_pass = $_POST["admin_pass"];

    if ($admin_pass !== "Alitex12!") {
        header("Location: login.php?add_admin_error=true");
        exit();
    }

    $sqlCheckUser = "SELECT * FROM usuario WHERE usuario = ?";
    $stmtCheckUser = $pdo->prepare($sqlCheckUser);
    $stmtCheckUser->execute([$usuario]);
    if ($stmtCheckUser->rowCount() > 0) {
        header("Location: login.php?add_user_exists=true");
        exit();
    }

    $sqlCheckPhone = "SELECT * FROM usuario WHERE telefono = ?";
    $stmtCheckPhone = $pdo->prepare($sqlCheckPhone);
    $stmtCheckPhone->execute([$telefono]);
    if ($stmtCheckPhone->rowCount() > 0) {
        header("Location: login.php?add_phone_exists=true");
        exit();
    }

    $hashedPass = encrypt($pass);

    $sql = "INSERT INTO usuario (nombre, apellido, usuario, clave, telefono) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$nombre, $apellido, $usuario, $hashedPass, $telefono])) {
        header("Location: login.php?add_success=true");
        exit();
    } else {
        header("Location: login.php?add_error=true");
        exit();
    }
}
?>
