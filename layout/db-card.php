<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT 
    p.id_producto,
    p.nombre_producto,
    p.id_estado,
    pr.precio,
    pr.descuento
FROM 
    productos p
INNER JOIN 
    estados e ON p.id_estado = e.id_estado
LEFT JOIN 
    precios pr ON p.id_producto = pr.id_producto;
");

$sql->execute();
$resultado = $sql->fetchALL(PDO::FETCH_ASSOC);
?>
