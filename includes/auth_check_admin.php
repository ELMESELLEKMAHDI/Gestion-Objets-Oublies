<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['loggedin']) || ($_SESSION['role'] ?? '') !== 'admin') {
    $redirect = defined('ADMIN_LOGIN_PATH') ? ADMIN_LOGIN_PATH : '../logincon/login.php';
    header("Location: " . $redirect);
    exit();
}
