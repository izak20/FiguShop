<?php
require '../config/config.php';
require '../config/database.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'agregar') {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

        if ($id > 0 && $cantidad > 0) {
            $_SESSION['carrito']['productos'][$id] = $cantidad;

            $subtotal = calcularSubtotalProducto($id, $cantidad);

            if ($subtotal !== false) {
                $response = [
                    'ok' => true,
                    'sub' => '$' . number_format($subtotal, 2, '.', ','),
                    'numero' => obtenerCantidadTotalProductosEnCarrito()
                ];
            } else {
                $response = [
                    'ok' => false,
                    'error' => 'Error al calcular el subtotal del producto'
                ];
            }
        } else {
            $response = [
                'ok' => false,
                'error' => 'Datos de entrada inválidos'
            ];
        }
    } elseif ($action === 'eliminar') {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;

        if ($id > 0) {
            $datos['ok'] = eliminar($id);
            $response = [
                'ok' => true,
                'numero' => obtenerCantidadTotalProductosEnCarrito()
            ];
        } else {
            $response = [
                'ok' => false,
                'error' => 'ID de producto inválido'
            ];
        }
    } else {
        $response = [
            'ok' => false,
            'error' => 'Acción no válida'
        ];
    }
} else {
    $response = [
        'ok' => false,
        'error' => 'Acción no especificada'
    ];
}

echo json_encode($response);

function calcularSubtotalProducto($id, $cantidad)
{
    $subtotal = 0;
    $db = new Database();
    $con = $db->conectar();
    $sql = $con->prepare("SELECT pr.precio, pr.descuento FROM productos p LEFT JOIN precios pr ON p.id_producto = pr.id_producto WHERE p.id_producto = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $producto = $sql->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        $precio = $producto['precio'];
        $descuento = $producto['descuento'];

        $precio_desc = $precio - (($precio * $descuento) / 100);
        $subtotal = $cantidad * $precio_desc;
    }

    return $subtotal;
}

function obtenerCantidadTotalProductosEnCarrito()
{
    $total = 0;

    if (isset($_SESSION['carrito']['productos'])) {
        foreach ($_SESSION['carrito']['productos'] as $cantidad) {
            $total += $cantidad;
        }
    }

    return $total;
}

function eliminar($id)
{
    if ($id > 0) {
        if (isset($_SESSION['carrito']['productos'][$id])) {
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }
    return false;
}
