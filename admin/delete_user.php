<?php
require_once __DIR__ . '/../includes/auth_check_admin.php';
require_once __DIR__ . '/../config/db.php';

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: users.php");
    exit();
}

if ($id === (int) ($_SESSION['user_id'] ?? 0)) {
    $_SESSION['admin_error'] = "Vous ne pouvez pas supprimer votre propre compte.";
    header("Location: users.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM admin WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$user = $stmt->fetch();

if (!$user) {
    $_SESSION['admin_error'] = "Compte introuvable.";
    header("Location: users.php");
    exit();
}

if ($user['role'] === 'admin') {
    $adminCount = (int) $conn->query("SELECT COUNT(*) FROM admin WHERE role = 'admin'")->fetchColumn();
    if ($adminCount <= 1) {
        $_SESSION['admin_error'] = "Impossible de supprimer le dernier compte administrateur.";
        header("Location: users.php");
        exit();
    }
}

$delete = $conn->prepare("DELETE FROM admin WHERE id = :id");
$delete->bindValue(':id', $id);
$delete->execute();

$_SESSION['admin_success'] = "Compte \"" . $user['User_name'] . "\" supprimé.";
header("Location: " . ($user['role'] === 'employe' ? 'employees.php' : 'users.php'));
exit();
