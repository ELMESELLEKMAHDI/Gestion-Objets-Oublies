<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['loggedin'])) {
    $redirect = defined('AUTH_LOGIN_PATH') ? AUTH_LOGIN_PATH : 'login.php';
    header("Location: " . $redirect);
    exit();
}

if (($_SESSION['role'] ?? '') !== 'manager') {
    $redirect = defined('AUTH_MANAGER_DENIED_PATH') ? AUTH_MANAGER_DENIED_PATH : 'index-2.php';
    header("Location: " . $redirect);
    exit();
}
