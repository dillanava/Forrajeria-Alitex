<?php
// Definir constantes para la conexión a la base de datos
define("MYSQL_HOST", "localhost");
define("MYSQL_DATABASE_NAME", "forrajeriaalitex");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");

// Crear una conexión PDO a la base de datos
try {
    $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE_NAME, MYSQL_USER, MYSQL_PASSWORD);
    // Configurar PDO para que arroje excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejar cualquier error de conexión a la base de datos
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
