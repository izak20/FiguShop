<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Agrega logging para depuración
    error_log('Solicitud POST recibida.');

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

    // Más logging para verificar los valores recibidos
    error_log('ID: ' . $id);
    error_log('Token: ' . $token);

    if ($id !== false && $token !== null && $token === hash_hmac('sha1', $id, 'APR.wqc-354*')) {
        // Agrega logging para verificar la lógica del carrito
        error_log('Parámetros válidos.');

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
        error_log('Respuesta: ' . json_encode($response)); // Logging para la respuesta
        exit;
    } else {
        $response = [
            'ok' => false,
            'error' => 'Parámetros inválidos o token incorrecto'
        ];
        echo json_encode($response);
        error_log('Error: Parámetros inválidos o token incorrecto'); // Logging de error
        exit;
    }
} else {
    $response = [
        'ok' => false,
        'error' => 'Método no permitido'
    ];
    http_response_code(405);
    echo json_encode($response);
    error_log('Error: Método no permitido'); // Logging de error
    exit;
}
