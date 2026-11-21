<nav id="appSidebar">
    <div id="sidebarBrand">
        <img src="img/image_gi.png" alt="" class="image_gi">
        <div class="brand-title">GUERMAÏ INFORMATIQUE</div>
        <div class="brand-subtitle">Gestion des objets oubliés</div>
    </div>
    <ul>
        <li><a href="index-2.php" <?= ($activePage ?? '') === 'index' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-home"></span>Gestion des objets oubliés</a></li>
        <li><a href="gestion_categories.php" <?= ($activePage ?? '') === 'categories' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-book"></span>Gestion des catégories</a></li>
        <li><a href="objets_perimes.php" <?= ($activePage ?? '') === 'perimes' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-time"></span>Objets non réclamés (+1 an)</a></li>
        <li><a href="rapport.php" <?= ($activePage ?? '') === 'rapport' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-stats"></span>Rapport</a></li>
        <li><a href="../login.php" class="nav-logout"><span class="glyphicon glyphicon-log-out"></span>Déconnexion</a></li>
    </ul>
    
</nav>
