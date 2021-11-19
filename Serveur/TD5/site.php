<?php
$dsn = "mysql:dbname=etu_tduthil;host=info-titania";
$user = 'tduthil';
$password = 'fVcFs7p3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Site</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav" style="flex-direction: row;">
                <li class="nav-item p-3">
                    <a class="nav-link" href="/TD4/user.php">Inscription</a>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="identification.php">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="text-center">Bienvenue sur le site</h1>
</body>

</html>