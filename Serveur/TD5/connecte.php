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
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <ul>
        <li>
            <a href="logout.php">Déconnexion</a>
        </li>
        <li>
            <a href="/TD3/BDD.php">Series</a>
        </li>
    </ul>
    <?php
    if (isset($_SESSION['name'])) {
        echo "Bienvenue " . $_SESSION['name'] . "!";

    } else {
        header('location: identification.php');
    } ?>
</body>

</html>