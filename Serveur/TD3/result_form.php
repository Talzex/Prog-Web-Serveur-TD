<?php
$dsn = "mysql:dbname=etu_tduthil;host=info-titania";
$user = 'tduthil';
$password = 'fVcFs7p3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Requete Formulaire</title>
</head>

<body>
    <?php
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $sql = "SELECT title FROM series WHERE title LIKE :title ";
        $query = $pdo->prepare($sql);
        $query->execute(['title' => $_POST['nom'].'%']);
        }
    foreach ($query as $row) {
        echo 'Nom : ' . $row['title'] . "<br>";
    }
    ?>

</body>

</html>