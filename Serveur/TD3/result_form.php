<?php
include('../bdd_path.php');
$title = 'Résultat Formulaire';
include('../head.php');
include('../navbar.php');
require_once('../pageprotegee.php');
?>
<!DOCTYPE html>
<html lang="en">

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