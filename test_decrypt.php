<?php
// Incluye el archivo con las funciones de encriptación
include 'encrypt.php';

// Contraseña encriptada almacenada en la base de datos
$encryptedPassword = "klM01s8vPXqG1EQDtrxDoKbAMjkmHxgvpDESss4kf9cMIMGmW7zOaL5c007OJ025U4KpUOi1QHjz6fcY6Kgy4Q==s";

// Desencriptar la contraseña
$decryptedPassword = decrypt($encryptedPassword);

// Imprimir la contraseña desencriptada
echo "Contraseña desencriptada: $decryptedPassword";
?>
