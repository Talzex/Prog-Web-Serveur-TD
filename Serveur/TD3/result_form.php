<?php
include('../bdd_path.php');
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