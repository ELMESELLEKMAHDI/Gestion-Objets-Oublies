<?php
require_once __DIR__ . '/../includes/auth_check_admin.php';
require_once __DIR__ . '/../config/db.php';

$pageTitle  = 'Tableau de bord';
$activePage = 'dashboard';

$totalObjects = (int) $conn->query("SELECT COUNT(*) FROM object")->fetchColumn();
$totalRendu   = (int) $conn->query("SELECT COUNT(*) FROM object WHERE `status` = 'rendu'")->fetchColumn();
$totalTrouve  = (int) $conn->query("SELECT COUNT(*) FROM object WHERE `status` = 'trouve'")->fetchColumn();
$totalEmployes = (int) $conn->query("SELECT COUNT(*) FROM admin WHERE role = 'employe'")->fetchColumn();
$totalAdmins   = (int) $conn->query("SELECT COUNT(*) FROM admin WHERE role = 'admin'")->fetchColumn();

$stmt = $conn->query("SELECT id, name, categorie, chambre, `date`, `status` FROM object ORDER BY id DESC LIMIT 6");
$latestObjects = $stmt->fetchAll();

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/sidebar.php';
?>

<div class="page-heading">
    <h1>Tableau de bord</h1>
    <p>Vue d'ensemble de la gestion des objets oubliés.</p>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><span class="glyphicon glyphicon-briefcase"></span></div>
        <div>
            <div class="stat-value"><?= $totalObjects ?></div>
            <div class="stat-label">Objets au total</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><span class="glyphicon glyphicon-ok"></span></div>
        <div>
            <div class="stat-value"><?= $totalRendu ?></div>
            <div class="stat-label">Objets rendus</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon red"><span class="glyphicon glyphicon-time"></span></div>
        <div>
            <div class="stat-value"><?= $totalTrouve ?></div>
            <div class="stat-label">Objets non rendus</div>
        </div>
    </div>
    
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h3>Derniers objets ajoutés</h3>
        <a href="objects.php" class="btn-admin-ghost">Voir tout</a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        <?php if (empty($latestObjects)): ?>
            <div class="empty-state">Aucun objet enregistré pour le moment.</div>
        <?php else: ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Objet</th>
                    <th>Catégorie</th>
                    <th>Chambre</th>
                    <th>Date</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($latestObjects as $o): ?>
                <tr>
                    <td><?= htmlspecialchars($o['name']) ?></td>
                    <td><?= htmlspecialchars($o['categorie']) ?></td>
                    <td><?= htmlspecialchars($o['chambre']) ?></td>
                    <td><?= htmlspecialchars($o['date']) ?></td>
                    <td>
                        <span class="status-pill <?= $o['status'] === 'rendu' ? 'rendu' : 'trouve' ?>">
                            <?= $o['status'] === 'rendu' ? 'Rendu' : 'Non rendu' ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/includes/foot.php'; ?>
