<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['loggedin']) || !in_array($_SESSION['role'] ?? '', ['admin', 'employe'], true)) {
    header('Content-Type: application/json');
    http_response_code(401);
    echo json_encode(["error" => "Non autorisé. Veuillez vous reconnecter."]);
    exit();
}
