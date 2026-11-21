<?php
require_once __DIR__ . '/../includes/auth_check_admin.php';
require_once __DIR__ . '/../config/db.php';

$pageTitle  = 'Nouveau compte';
$activePage = 'users';

$errors = [];
$User_name = '';
$role = $_GET['role'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $User_name = trim($_POST['User_name'] ?? '');
    $password  = $_POST['password'] ?? '';
    $password2 = $_POST['password_confirm'] ?? '';
    $role      = $_POST['role'] ?? '';

    if ($User_name === '' || !preg_match('/^[a-zA-Z0-9_.-]+$/', $User_name)) {
        $errors[] = "Le nom d'utilisateur est requis (lettres, chiffres, . _ - uniquement).";
    }
    if (strlen($password) < 6) {
        $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }
    if ($password !== $password2) {
        $errors[] = "Les deux mots de passe ne correspondent pas.";
    }
    if (!in_array($role, ['admin', 'employe'], true)) {
        $errors[] = "Veuillez choisir un rôle valide.";
    }

    if (empty($errors)) {
        $check = $conn->prepare("SELECT id FROM admin WHERE User_name = :u");
        $check->bindValue(':u', $User_name);
        $check->execute();
        if ($check->fetch()) {
            $errors[] = "Ce nom d'utilisateur est déjà utilisé.";
        }
    }

    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO admin (User_name, password, role) VALUES (:u, :p, :r)");
        $insert->bindValue(':u', $User_name);
        $insert->bindValue(':p', $hash);
        $insert->bindValue(':r', $role);
        $insert->execute();

        $_SESSION['admin_success'] = "Compte \"$User_name\" créé avec succès.";
        header("Location: " . ($role === 'employe' ? 'employees.php' : 'users.php'));
        exit();
    }
}

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/sidebar.php';
?>

<div class="page-heading">
    <h1>Nouveau compte</h1>
    <p>Créer un accès administrateur ou employé.</p>
</div>

<?php foreach ($errors as $e): ?>
    <div class="admin-alert danger"><?= htmlspecialchars($e) ?></div>
<?php endforeach; ?>

<div class="admin-card" style="max-width:520px;">
    <div class="admin-card-body">
        <form method="post" action="create_user.php">
            <div class="admin-form-group">
                <label>Nom d'utilisateur</label>
                <input type="text" class="form-control" name="User_name" value="<?= htmlspecialchars($User_name) ?>" required>
            </div>
            <div class="admin-form-group">
                <label>Mot de passe</label>
                <input type="password" class="form-control" name="password" required minlength="6">
            </div>
            <div class="admin-form-group">
                <label>Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="password_confirm" required minlength="6">
            </div>
            <div class="admin-form-group">
                <label>Rôle</label>
                <select name="role" class="form-control" required>
                    <option value="">Sélectionner un rôle</option>
                    <option value="employe" <?= $role === 'employe' ? 'selected' : '' ?>>Employé</option>
                    <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Administrateur</option>
                </select>
                <div class="hint">Les employés ont un accès en lecture / recherche. Les administrateurs ont tous les droits.</div>
            </div>
            <button type="submit" class="btn-admin-gold"><span class="glyphicon glyphicon-ok"></span> Créer le compte</button>
            <a href="users.php" class="btn-admin-ghost" style="margin-left:8px;">Annuler</a>
        </form>
    </div>
</div>

<?php include __DIR__ . '/includes/foot.php'; ?>
