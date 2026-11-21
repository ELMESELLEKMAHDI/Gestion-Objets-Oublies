<?php
require_once __DIR__ . '/../../includes/auth_check_api.php';
require_once __DIR__ . '/../../config/db.php';

header('Content-Type: application/json');

$categorie = isset($_GET['categorie']) ? trim($_GET['categorie']) : "";

$sql = "SELECT * FROM object WHERE categorie = :categorie";
if (($_SESSION['role'] ?? '') === 'employe') {
    $sql .= " AND created_by = :current_uid";
}
$sql .= " ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':categorie', $categorie);
if (($_SESSION['role'] ?? '') === 'employe') {
    $stmt->bindValue(':current_uid', $_SESSION['user_id'] ?? 0);
}
$stmt->execute();

$data = [];
while ($row = $stmt->fetch()) {
    $data[] = $row;
}

echo json_encode($data);
