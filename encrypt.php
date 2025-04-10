<?php
// Funciones de encriptaci¨®n y desencriptaci¨®n utilizando OpenSSL

// Clave de encriptaci¨®n - aseg¨²rate de mantenerla segura y no compartirla
define("ENCRYPTION_KEY", "k9qyz4PiMsXaDzpdppqH4GgyseKRGEGd");

function encrypt($data) {
    $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($data, $cipher, ENCRYPTION_KEY, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary = true);
    return base64_encode($iv . $hmac . $ciphertext_raw);
}

function decrypt($data) {
    $c = base64_decode($data);
    $ivlen = openssl_cipher_iv_length($cipher = "AES-256-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, ENCRYPTION_KEY, $options = OPENSSL_RAW_DATA, $iv);
    
    $calcmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary = true);

    error_log("Datos a desencriptar: '$data'");
    error_log("Longitud de IV: $ivlen");
    error_log("IV: " . bin2hex($iv));
    error_log("HMAC: " . bin2hex($hmac));
    error_log("Texto cifrado: " . bin2hex($ciphertext_raw));
    error_log("Texto descifrado: '$original_plaintext'");

    if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
    } else {
        return false;
    }
}
?>
