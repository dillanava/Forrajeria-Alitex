<?php
// Incluye el archivo con las funciones de encriptación
include 'encrypt.php';

// Función para probar la encriptación y desencriptación
function testEncryption($data) {
    echo "Datos originales: $data<br>";
    
    // Encriptar los datos
    $encrypted = encrypt($data);
    echo "Datos encriptados: $encrypted<br>";
    
    // Desencriptar los datos
    $decrypted = decrypt($encrypted);
    echo "Datos desencriptados: $decrypted<br>";
    
    // Verificar si la desencriptación es correcta
    if ($data === $decrypted) {
        echo "La encriptación y desencriptación funcionan correctamente.<br>";
    } else {
        echo "Error: La desencriptación no coincide con los datos originales.<br>";
    }
}

// Datos de prueba
$testData = "Este es un texto de prueba.";

// Probar la encriptación y desencriptación
testEncryption($testData);
?>
