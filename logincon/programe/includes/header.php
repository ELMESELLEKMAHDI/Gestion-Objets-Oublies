    <div id="appTopbar">
        <button id="appMenuBtn" type="button">&#9776;</button>
        <span id="appTopbarTitle"><?= htmlspecialchars($pageTitle ?? '') ?></span>
        <div id="appAdminMenu">
            <span class="glyphicon glyphicon-user"></span>
            <span class="admin-label"><?= htmlspecialchars($_SESSION['User_name'] ?? 'Utilisateur') ?></span>
        </div>
    </div>

    <div id="appOverlay"></div>
