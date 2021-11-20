<?php
include('../bdd_path.php');

header("Content-type: image/png");

if(isset($_GET['id'])){
    $sql = $pdo->prepare('SELECT poster FROM series WHERE id=?');
    $sql->execute([$_GET['id']]);
    $serie = $sql->fetch();

    echo $serie['poster'];
}
