<?php
$dsn = "mysql:dbname=etu_tduthil;host=info-titania";
$user = 'tduthil';
$password = 'fVcFs7p3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php session_start();

    if (isset($_SESSION['name'])) {
        echo "Bienvenue " . $_SESSION['name'] . "!";
    } else {
        header('location: identification.php');
    } ?>
    <p>Yo</p>
</body>

</html>