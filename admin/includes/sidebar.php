<nav id="adminSidebar">
    <div class="brand-block">
        <img src="../logincon/programe/img/image_gi.png" alt="Logo">
        <div class="name">GUERMAÏ INFORMATIQUE</div>
        <span class="role-badge">Administrateur</span>
    </div>
    <ul>
        <li><a href="dashboard.php" <?= ($activePage ?? '') === 'dashboard' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-dashboard"></span>Tableau de bord</a></li>
        <li><a href="objects.php" <?= ($activePage ?? '') === 'objects' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-briefcase"></span>Objets oubliés</a></li>
        <li><a href="users.php" <?= ($activePage ?? '') === 'users' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-list-alt"></span>Utilisateurs</a></li>
        <li class="nav-sep"></li>
        <li><a href="../logincon/programe/index-2.php"><span class="glyphicon glyphicon-repeat"></span>Espace Employé</a></li>
        <li><a href="../logincon/login.php" class="nav-logout"><span class="glyphicon glyphicon-log-out"></span>Déconnexion</a></li>
    </ul>
</nav>

<div id="adminContent">
