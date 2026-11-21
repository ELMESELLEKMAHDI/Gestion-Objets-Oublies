<?php
require_once __DIR__ . '/../../includes/auth_check_api.php';
require_once __DIR__ . '/../../config/db.php';

header("Content-Type: application/json");

// 1) Chkoun deakhel daba? (role + id dyalo mn session)
$role   = $_SESSION['role'] ?? '';
$userId = $_SESSION['user_id'] ?? 0;

// 2) Base dyal la requête. "WHERE 1=1" kaysehl zyada dyal conditions b "AND ..."
$sql    = "SELECT * FROM object WHERE 1=1";
$params = [];

// 3) Sécurité: employé ma ychouf ghi li houwa 3mmr, admin ychouf kolshi
if ($role === 'employe') {
    $sql .= " AND created_by = :current_uid";
    $params[':current_uid'] = $userId;
}

// 4) Filtres dyal recherche (kolhom optionnels, jayin mn l'formulaire)
if (isset($_GET['name']) && $_GET['name'] !== '') {
    $sql .= " AND name LIKE :name";
    $params[':name'] = "%" . $_GET['name'] . "%";
}
if (isset($_GET['categorie']) && $_GET['categorie'] !== '') {
    $sql .= " AND categorie = :categorie";
    $params[':categorie'] = $_GET['categorie'];
}
if (isset($_GET['description']) && $_GET['description'] !== '') {
    $sql .= " AND description LIKE :description";
    $params[':description'] = "%" . $_GET['description'] . "%";
}
if (isset($_GET['chambre']) && $_GET['chambre'] !== '') {
    $sql .= " AND chambre = :chambre";
    $params[':chambre'] = $_GET['chambre'];
}
if (isset($_GET['date_trouve']) && $_GET['date_trouve'] !== '') {
    $sql .= " AND `date` = :date_trouve";
    $params[':date_trouve'] = $_GET['date_trouve'];
}
if (isset($_GET['date_rendement']) && $_GET['date_rendement'] !== '') {
    $sql .= " AND date_rendement = :date_rendement";
    $params[':date_rendement'] = $_GET['date_rendement'];
}
if (isset($_GET['statut']) && $_GET['statut'] !== '') {
    $sql .= " AND `status` = :statut";
    $params[':statut'] = $_GET['statut'];
}

// Recherche libre (compatibilité ascendante avec un simple champ "search")
if (isset($_GET['search']) && $_GET['search'] !== '') {
    $sql .= " AND (name LIKE :s1 OR categorie LIKE :s2 OR chambre LIKE :s3 OR `date` LIKE :s4)";
    $searchVal = "%" . $_GET['search'] . "%";
    $params[':s1'] = $searchVal;
    $params[':s2'] = $searchVal;
    $params[':s3'] = $searchVal;
    $params[':s4'] = $searchVal;
}

// 5) Ordre: les objets jdad awal
$sql .= " ORDER BY id DESC";

// 6) Exécution w rj3 les résultats direct en JSON
$stmt = $conn->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
