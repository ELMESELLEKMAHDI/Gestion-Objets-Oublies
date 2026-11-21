<?php
require_once __DIR__ . '/../includes/auth_check_admin.php';
require_once __DIR__ . '/../config/db.php';

$pageTitle  = 'Utilisateurs';
$activePage = 'users';

$successMsg = $_SESSION['admin_success'] ?? '';
$errorMsg   = $_SESSION['admin_error'] ?? '';

$stmt = $conn->query("SELECT id, User_name, role FROM admin ORDER BY role ASC, User_name ASC");
$users = $stmt->fetchAll();

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/sidebar.php';
?>

<div class="page-heading">
    <h1>Utilisateurs</h1>
    <p>Gérer l'ensemble des comptes (administrateurs et employés).</p>
</div>

<?php if ($successMsg): ?><div class="admin-alert success"><?= htmlspecialchars($successMsg) ?></div><?php endif; ?>
<?php if ($errorMsg): ?><div class="admin-alert danger"><?= htmlspecialchars($errorMsg) ?></div><?php endif; ?>

<div class="admin-card">
    <div class="admin-card-header">
        <h3>Tous les comptes (<?= count($users) ?>)</h3>
        <a href="create_user.php" class="btn-admin-gold"><span class="glyphicon glyphicon-plus"></span> Nouveau compte</a>
    </div>
    <div class="admin-card-body" style="padding:0;">
        <?php if (empty($users)): ?>
            <div class="empty-state">Aucun compte trouvé.</div>
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
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['User_name']) ?></td>
                    <td><span class="role-pill <?= $u['role'] === 'admin' ? 'admin' : 'employe' ?>"><?= htmlspecialchars($u['role']) ?></span></td>
                    <td style="text-align:right;">
                        <a class="icon-btn" href="edit_user.php?id=<?= (int) $u['id'] ?>" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
                        <?php if ((int) $u['id'] !== (int) ($_SESSION['user_id'] ?? 0)): ?>
                        <a class="icon-btn danger" href="delete_user.php?id=<?= (int) $u['id'] ?>" title="Supprimer" onclick="return confirm('Supprimer définitivement ce compte (<?= htmlspecialchars(addslashes($u['User_name'])) ?>) ?');"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/includes/foot.php'; ?>
