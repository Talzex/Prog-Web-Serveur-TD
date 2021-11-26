<?php
include('../bdd_path.php');
$title = 'Calculatrice';
include('../head.php');
include('../navbar.php');
require_once('../pageprotegee.php');
?>
<!DOCTYPE html>
<html lang="fr">
<body>
    <h1>Calculatrice GET</h1>
    <form method="GET">
        <input type="number" name="nb1" required>
        <label for="+">+</label>
        <input type="number" name="nb2" required>
        <input type="submit" value="calculatrice">
    </form>
    <?php if(isset($_GET['nb1']) && isset($_GET['nb2'])){
            $somme = $_GET['nb1'] + $_GET['nb2']?>
            <p><?= $somme ?></p>
    <?php } ?>

    <h1>Calculatrice POST</h1>
    <form method="POST">
        <input type="number" name="nb1" required>
        <label for="+">+</label>
        <input type="number" name="nb2" required>
        <input type="submit" value="calculatrice">
    </form>
    <?php if(isset($_POST['nb1']) && isset($_POST['nb2'])){
            $somme = $_POST['nb1'] + $_POST['nb2']?>
            <p><?= $somme ?></p>
    <?php } ?>

</body>

</html>