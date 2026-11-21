<?php
require_once __DIR__ . '/../../includes/auth_check_api.php';
require_once __DIR__ . '/../../config/db.php';

header('Content-Type: application/json');

$search = isset($_GET['search']) ? trim($_GET['search']) : "";

$countsSelect = "categorie,
        COUNT(*) as nb,
        SUM(CASE WHEN status = 'rendu' THEN 1 ELSE 0 END) as rendu,
        SUM(CASE WHEN status = 'rendu' THEN 0 ELSE 1 END) as non_rendu";

$isEmploye = ($_SESSION['role'] ?? '') === 'employe';
$currentUid = $_SESSION['user_id'] ?? 0;

if ($search !== "") {
    $sql = "SELECT $countsSelect FROM object WHERE categorie LIKE :search";
    if ($isEmploye) {
        $sql .= " AND created_by = :current_uid";
    }
    $sql .= " GROUP BY categorie ORDER BY categorie ASC";
    $stmt = $conn->prepare($sql);
    $likeSearch = "%$search%";
    $stmt->bindValue(':search', $likeSearch);
    if ($isEmploye) {
        $stmt->bindValue(':current_uid', $currentUid);
    }
    $stmt->execute();
} else {
    $sql = "SELECT $countsSelect FROM object";
    if ($isEmploye) {
        $sql .= " WHERE created_by = :current_uid";
    }
    $sql .= " GROUP BY categorie ORDER BY categorie ASC";
    $stmt = $conn->prepare($sql);
    if ($isEmploye) {
        $stmt->bindValue(':current_uid', $currentUid);
    }
    $stmt->execute();
}

$data = [];
while ($row = $stmt->fetch()) {
    $data[] = $row;
}

echo json_encode($data);
