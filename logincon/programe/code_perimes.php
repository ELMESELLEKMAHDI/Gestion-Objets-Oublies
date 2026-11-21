<?php
require_once __DIR__ . '/../../includes/auth_check_api.php';
require_once __DIR__ . '/../../config/db.php';

header("Content-Type: application/json");

$conditions = ["`date` < (CURDATE() - INTERVAL 1 YEAR)"];
$params = [];

if (($_SESSION['role'] ?? '') === 'employe') {
    $conditions[] = "created_by = :current_uid";
    $params[':current_uid'] = $_SESSION['user_id'] ?? 0;
}

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $conditions[] = "(name LIKE :s1 OR categorie LIKE :s2 OR chambre LIKE :s3)";
    $searchVal = "%" . $_GET['search'] . "%";
    $params[':s1'] = $searchVal;
    $params[':s2'] = $searchVal;
    $params[':s3'] = $searchVal;
}

$sql = "SELECT * FROM object WHERE " . implode(" AND ", $conditions) . " ORDER BY `date` ASC";

$stmt = $conn->prepare($sql);
$stmt->execute($params);

$result = [];
while ($row = $stmt->fetch()) {
    $result[] = [
        "id" => $row["id"],
        "name" => $row["name"],
        "categorie" => $row["categorie"],
        "description" => $row["description"],
        "chambre" => $row["chambre"],
        "date" => $row["date"],
        "photo" => $row["photo"],
        "status" => $row["status"],
        "date_rendement"=> $row["date_rendement"],
    ];
}
echo json_encode($result);
