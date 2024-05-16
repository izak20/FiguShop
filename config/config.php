<?php
// Define la clave del token solo si no está definida previamente
if (!defined("KEY_TOKEN")) {
    define("KEY_TOKEN", "APR.wqc-354*");
}

// Iniciar la sesión solo si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Calcular la cantidad total de productos en el carrito
$num_cart = 0;

if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = array_sum($_SESSION['carrito']['productos']);
}
?>


