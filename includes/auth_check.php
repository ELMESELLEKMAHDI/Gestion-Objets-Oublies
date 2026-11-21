<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['loggedin']) || !in_array($_SESSION['role'] ?? '', ['admin', 'employe'], true)) {
    $redirect = defined('AUTH_LOGIN_PATH') ? AUTH_LOGIN_PATH : 'login.php';
    header("Location: " . $redirect);
    exit();
}
