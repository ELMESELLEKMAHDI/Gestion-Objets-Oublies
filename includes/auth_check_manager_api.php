<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json');

if (empty($_SESSION['loggedin'])) {
    http_response_code(401);
    echo json_encode(["error" => "Non autorisé. Veuillez vous reconnecter."]);
    exit();
}

if (($_SESSION['role'] ?? '') !== 'manager') {
    http_response_code(403);
    echo json_encode(["error" => "Accès réservé au Manager."]);
    exit();
}
