<?php
session_start();
?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav" style="flex-direction: row;">
            <?php if (isset($_SESSION['id'])){ ?>
                <li class="nav-item p-3">
                    <a class="nav-link" href="/TD1/multiplications.php">Multiplications</a>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="/TD2/calculatrice.php">Calculatrice</a>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="/TD2/calendrier.php">Calendrier UNDER CONSTRUCTION</a>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="/TD3/BDD.php">Séries</a>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link"href="/TD5/logout.php">Déconnexion</a>
                </li>
            <?php }else{ ?>
                <li class="nav-item p-3">
                    <a class="nav-link" href="/TD4/inscription.php">Inscription</a>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="/TD5/connexion.php">Connexion</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>