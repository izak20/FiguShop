<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

    if ($id !== false && $token !== null) {
        // Verificar lógica de agregar producto al carrito
        if (!isset($_SESSION['carrito']['productos'])) {
            $_SESSION['carrito']['productos'] = [];
        }

        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id]++;
        } else {
            $_SESSION['carrito']['productos'][$id] = 1;
        }

        $cantidad_total = array_sum($_SESSION['carrito']['productos']);

        $response = [
            'ok' => true,
            'numero' => $cantidad_total
        ];
        echo json_encode($response);
        exit;
    } else {
        $response = [
            'ok' => false,
            'error' => 'Parámetros inválidos'
        ];
        echo json_encode($response);
        exit;
    }
} else {
    $response = [
        'ok' => false,
        'error' => 'Método no permitido'
    ];
    http_response_code(405);
    echo json_encode($response);
    exit;
}
?>



