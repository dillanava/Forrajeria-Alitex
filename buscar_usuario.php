<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_pass = $_POST["admin_pass"];

    if ($admin_pass !== "Alitex12!") {
        echo "<p>Contraseña de administrador incorrecta.</p>";
        exit();
    }

    $sql = "SELECT usuario, nombre, apellido, telefono FROM usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($usuarios) > 0) {
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>Usuario</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th></tr></thead>";
        echo "<tbody>";
        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($usuario['usuario']) . "</td>";
            echo "<td>" . htmlspecialchars($usuario['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($usuario['apellido']) . "</td>";
            echo "<td>" . htmlspecialchars($usuario['telefono']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No se encontraron usuarios.</p>";
    }
}
?>
