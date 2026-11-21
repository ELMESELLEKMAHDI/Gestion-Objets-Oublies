<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Espace Administrateur') ?> — Guermaï Informatique</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/admin.css?v=<?= @filemtime(__DIR__ . '/../assets/admin.css') ?: time() ?>">
</head>
<body>

<div id="adminTopbar">
    <button id="adminMenuBtn" type="button" aria-label="Menu">&#9776;</button>
    <span id="adminTopbarTitle"><?= htmlspecialchars($pageTitle ?? 'Espace Administrateur') ?></span>
    <div id="adminUserChip">
        <span class="avatar-circle"><?= htmlspecialchars(strtoupper(substr($_SESSION['User_name'] ?? 'A', 0, 1))) ?></span>
        <span><?= htmlspecialchars($_SESSION['User_name'] ?? '') ?></span>
    </div>
</div>

<div id="adminOverlay"></div>
