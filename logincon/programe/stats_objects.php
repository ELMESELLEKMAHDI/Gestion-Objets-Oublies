<?php
require_once __DIR__ . '/../../includes/auth_check_api.php';
require_once __DIR__ . '/../../config/db.php';

header('Content-Type: application/json');

$isEmploye = ($_SESSION['role'] ?? '') === 'employe';

$sql = "SELECT
        COUNT(*) as total,
        SUM(CASE WHEN status = 'rendu' THEN 1 ELSE 0 END) as rendus,
        SUM(CASE WHEN status = 'rendu' THEN 0 ELSE 1 END) as non_rendus
     FROM object";
if ($isEmploye) {
    $sql .= " WHERE created_by = :current_uid";
}

$stmt = $conn->prepare($sql);
if ($isEmploye) {
    $stmt->bindValue(':current_uid', $_SESSION['user_id'] ?? 0);
}
$stmt->execute();
$row = $stmt->fetch();

echo json_encode([
    "total"      => (int) ($row['total'] ?? 0),
    "rendus"     => (int) ($row['rendus'] ?? 0),
    "non_rendus" => (int) ($row['non_rendus'] ?? 0),
]);
