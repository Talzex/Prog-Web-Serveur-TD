<?php
include('../bdd_path.php');
$title = 'Inscription';
include('../head.php');
include('../navbar.php');
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <?php
    if (isset($_SESSION['id'])) { ?>
        <h1 class="text-center">Welcome to the dark side ! </h1>
    <?php } else {
        header('location: connexion.php');
    } ?>
</body>

</html>