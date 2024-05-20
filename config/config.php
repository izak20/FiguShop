<?php
if (!defined("KEY_TOKEN")) {
    define("KEY_TOKEN", "APR.wqc-354*");
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define("CLIENT_ID", "AV5ds9tzC7T_OIyF09FSGLNzBFWH-QcbVE_8bWvYeBsp5bK21ghDIxScyMGFtb3hIACmEv3fz9v8XeKV");
define("CURRENCY","USD");

$num_cart = 0;

if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = array_sum($_SESSION['carrito']['productos']);
}
?>
