<?php
require_once __DIR__ . '/../includes/auth_check_admin.php';
require_once __DIR__ . '/../config/db.php';

$pageTitle  = 'Employés';
$activePage = 'employees';

$successMsg = $_SESSION['admin_success'] ?? '';
$errorMsg   = $_SESSION['admin_error'] ?? '';

$stmt = $conn->query("SELECT id, User_name, role FROM admin WHERE role = 'employe' ORDER BY User_name ASC");
$employees = $stmt->fetchAll();

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/sidebar.php';
?>

<div class="page-heading">
    <h1>Employés</h1>
    <p>Comptes du personnel disposant d'un accès à l'espace employé (lecture, recherche, rapports).</p>
</div>

<?php if ($successMsg): ?><div class="admin-alert success"><?= htmlspecialchars($successMsg) ?></div><?php endif; ?>
<?php if ($errorMsg): ?><div class="admin-alert danger"><?= htmlspecialchars($errorMsg) ?></div><?php endif; ?>

<div class="admin-card">
    <div class="admin-card-header">
        <h3>Liste des employés (<?= count($employees) ?>)</h3>
        <a href="create_user.php?role=employe" class="btn-admin-gold"><span class="glyphicon glyphicon-plus"></span> Ajouter un employé</a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        <?php if (empty($employees)): ?>
            <div class="empty-state">Aucun employé enregistré pour le moment.</div>
        <?php else: ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nom d'utilisateur</th>
                    <th>Rôle</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['User_name']) ?></td>
                    <td><span class="role-pill employe">employe</span></td>
                    <td style="text-align:right;">
                        <a class="icon-btn" href="edit_user.php?id=<?= (int) $u['id'] ?>" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="icon-btn danger" href="delete_user.php?id=<?= (int) $u['id'] ?>" title="Supprimer" onclick="return confirm('Supprimer définitivement cet employé (<?= htmlspecialchars(addslashes($u['User_name'])) ?>) ?');"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/includes/foot.php'; ?>
