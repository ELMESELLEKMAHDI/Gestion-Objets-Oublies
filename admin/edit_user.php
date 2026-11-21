<?php
require_once __DIR__ . '/../includes/auth_check_admin.php';
require_once __DIR__ . '/../config/db.php';

$pageTitle  = 'Modifier le compte';
$activePage = 'users';

$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);
if ($id <= 0) {
    header("Location: users.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM admin WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$user = $stmt->fetch();

if (!$user) {
    $_SESSION['admin_error'] = "Compte introuvable.";
    header("Location: users.php");
    exit();
}

$errors = [];
$User_name = $user['User_name'];
$role = $user['role'];
$isSelf = ((int) $user['id'] === (int) ($_SESSION['user_id'] ?? 0));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $User_name = trim($_POST['User_name'] ?? '');
    $role      = $_POST['role'] ?? '';
    $password  = $_POST['password'] ?? '';
    $password2 = $_POST['password_confirm'] ?? '';

    if ($User_name === '' || !preg_match('/^[a-zA-Z0-9_.-]+$/', $User_name)) {
        $errors[] = "Le nom d'utilisateur est requis (lettres, chiffres, . _ - uniquement).";
    }
    if (!in_array($role, ['admin', 'employe'], true)) {
        $errors[] = "Veuillez choisir un rôle valide.";
    }
    if ($isSelf && $role !== 'admin') {
        $errors[] = "Vous ne pouvez pas retirer votre propre rôle administrateur.";
    }
    if ($password !== '' && strlen($password) < 6) {
        $errors[] = "Le nouveau mot de passe doit contenir au moins 6 caractères.";
    }
    if ($password !== '' && $password !== $password2) {
        $errors[] = "Les deux mots de passe ne correspondent pas.";
    }

    if (empty($errors)) {
        $check = $conn->prepare("SELECT id FROM admin WHERE User_name = :u AND id != :id");
        $check->bindValue(':u', $User_name);
        $check->bindValue(':id', $id);
        $check->execute();
        if ($check->fetch()) {
            $errors[] = "Ce nom d'utilisateur est déjà utilisé par un autre compte.";
        }
    }

    // Empêcher de retirer le dernier compte admin restant
    if (empty($errors) && $user['role'] === 'admin' && $role !== 'admin') {
        $adminCount = (int) $conn->query("SELECT COUNT(*) FROM admin WHERE role = 'admin'")->fetchColumn();
        if ($adminCount <= 1) {
            $errors[] = "Impossible de retirer le rôle administrateur : c'est le dernier compte administrateur.";
        }
    }

    if (empty($errors)) {
        if ($password !== '') {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE admin SET User_name = :u, role = :r, password = :p WHERE id = :id");
            $update->bindValue(':p', $hash);
        } else {
            $update = $conn->prepare("UPDATE admin SET User_name = :u, role = :r WHERE id = :id");
        }
        $update->bindValue(':u', $User_name);
        $update->bindValue(':r', $role);
        $update->bindValue(':id', $id);
        $update->execute();

        if ($isSelf) {
            $_SESSION['User_name'] = $User_name;
        }

        $_SESSION['admin_success'] = "Compte \"$User_name\" mis à jour.";
        header("Location: users.php");
        exit();
    }
}

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/sidebar.php';
?>

<div class="page-heading">
    <h1>Modifier le compte</h1>
    <p>Compte : <strong><?= htmlspecialchars($user['User_name']) ?></strong></p>
</div>

<?php foreach ($errors as $e): ?>
    <div class="admin-alert danger"><?= htmlspecialchars($e) ?></div>
<?php endforeach; ?>

<div class="admin-card" style="max-width:520px;">
    <div class="admin-card-body">
        <form method="post" action="edit_user.php?id=<?= $id ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="admin-form-group">
                <label>Nom d'utilisateur</label>
                <input type="text" class="form-control" name="User_name" value="<?= htmlspecialchars($User_name) ?>" required>
            </div>
            <div class="admin-form-group">
                <label>Rôle</label>
                <select name="role" class="form-control" required <?= $isSelf ? 'disabled' : '' ?>>
                    <option value="employe" <?= $role === 'employe' ? 'selected' : '' ?>>Employé</option>
                    <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Administrateur</option>
                </select>
                <?php if ($isSelf): ?>
                    <input type="hidden" name="role" value="admin">
                    <div class="hint">Vous ne pouvez pas modifier votre propre rôle.</div>
                <?php endif; ?>
            </div>
            <div class="admin-form-group">
                <label>Nouveau mot de passe <span style="font-weight:400;color:#94a3b8;">(laisser vide pour ne pas changer)</span></label>
                <input type="password" class="form-control" name="password" minlength="6">
            </div>
            <div class="admin-form-group">
                <label>Confirmer le nouveau mot de passe</label>
                <input type="password" class="form-control" name="password_confirm" minlength="6">
            </div>
            <button type="submit" class="btn-admin-gold"><span class="glyphicon glyphicon-ok"></span> Enregistrer</button>
            <a href="users.php" class="btn-admin-ghost" style="margin-left:8px;">Annuler</a>
        </form>
    </div>
</div>

<?php include __DIR__ . '/includes/foot.php'; ?>
