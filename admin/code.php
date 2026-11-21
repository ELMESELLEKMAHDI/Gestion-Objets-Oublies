<?php
require_once __DIR__ . '/../includes/auth_check_api.php';
require_once __DIR__ . '/../config/db.php';

header("Content-Type: application/json");

$conditions = [];
$params = [];

if (isset($_GET['name']) && $_GET['name'] !== '') {
    $conditions[] = "name LIKE :name";
    $params[':name'] = "%" . $_GET['name'] . "%";
}
if (isset($_GET['categorie']) && $_GET['categorie'] !== '') {
    $conditions[] = "categorie = :categorie";
    $params[':categorie'] = $_GET['categorie'];
}
if (isset($_GET['description']) && $_GET['description'] !== '') {
    $conditions[] = "description LIKE :description";
    $params[':description'] = "%" . $_GET['description'] . "%";
}
if (isset($_GET['chambre']) && $_GET['chambre'] !== '') {
    $conditions[] = "chambre = :chambre";
    $params[':chambre'] = $_GET['chambre'];
}
if (isset($_GET['date_trouve']) && $_GET['date_trouve'] !== '') {
    $conditions[] = "`date` = :date_trouve";
    $params[':date_trouve'] = $_GET['date_trouve'];
}
if (isset($_GET['date_rendement']) && $_GET['date_rendement'] !== '') {
    $conditions[] = "date_rendement = :date_rendement";
    $params[':date_rendement'] = $_GET['date_rendement'];
}
if (isset($_GET['statut']) && $_GET['statut'] !== '') {
    $conditions[] = "`status` = :statut";
    $params[':statut'] = $_GET['statut'];
}

if (isset($_GET['search']) && $_GET['search'] !== '') {
    $conditions[] = "(name LIKE :s1 OR categorie LIKE :s2 OR chambre LIKE :s3 OR `date` LIKE :s4)";
    $searchVal = "%" . $_GET['search'] . "%";
    $params[':s1'] = $searchVal;
    $params[':s2'] = $searchVal;
    $params[':s3'] = $searchVal;
    $params[':s4'] = $searchVal;
}

try {
    $sql = "SELECT * FROM object";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sql .= " ORDER BY id DESC";

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
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur base de données: " . $e->getMessage()]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur: " . $e->getMessage()]);
}


