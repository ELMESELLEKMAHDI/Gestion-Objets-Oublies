<?php
require_once __DIR__ . '/../../includes/auth_check_api.php';
require_once __DIR__ . '/../../config/db.php';

header('Content-Type: application/json');

$data = [];

//  Totaux generaux 
$data['total'] = (int) $conn->query("SELECT COUNT(*) FROM object")->fetchColumn();
$data['total_trouve'] = (int) $conn->query("SELECT COUNT(*) FROM object WHERE `status` = 'trouve'")->fetchColumn();
$data['total_rendu']  = (int) $conn->query("SELECT COUNT(*) FROM object WHERE `status` = 'rendu'")->fetchColumn();

// Objets non reclames depuis plus d'un an (meme regle que objets_perimes.php / code_perimes.php)
$data['total_perimes'] = (int) $conn->query(
    "SELECT COUNT(*) FROM object WHERE `date` < (CURDATE() - INTERVAL 1 YEAR)"
)->fetchColumn();

// Taux de restitution
$data['taux_restitution'] = $data['total'] > 0
    ? round(($data['total_rendu'] / $data['total']) * 100, 1)
    : 0;

// ===== Repartition par categorie =====
$stmt = $conn->query("SELECT categorie, COUNT(*) as nb FROM object GROUP BY categorie ORDER BY nb DESC");
$data['by_categorie'] = $stmt->fetchAll();

// ===== Repartition par chambre (top 10) =====
$stmt = $conn->query("SELECT chambre, COUNT(*) as nb FROM object GROUP BY chambre ORDER BY nb DESC LIMIT 10");
$data['by_chambre'] = $stmt->fetchAll();

// ===== Objets trouves par mois (12 derniers mois) =====
$stmt = $conn->query(
    "SELECT DATE_FORMAT(`date`, '%Y-%m') as mois, COUNT(*) as nb
     FROM object
     WHERE `date` >= (CURDATE() - INTERVAL 12 MONTH)
     GROUP BY mois
     ORDER BY mois ASC"
);
$data['by_month'] = $stmt->fetchAll();

//  Delai moyen de restitution (en jours, objets deja rendus)
$stmt = $conn->query(
    "SELECT AVG(DATEDIFF(date_rendement, `date`)) as moyenne
     FROM object
     WHERE `status` = 'rendu' AND date_rendement IS NOT NULL"
);
$moyenne = $stmt->fetchColumn();
$data['delai_moyen_jours'] = $moyenne !== null ? round((float) $moyenne, 1) : null;

echo json_encode($data);
