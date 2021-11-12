<?php
$dsn = "mysql:dbname=etu_tduthil;host=info-titania";
$user = 'tduthil';
$password = 'fVcFs7p3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');

header("Content-type: image/png");

if(isset($_GET['id'])){
    $sql = $pdo->prepare('SELECT poster FROM series WHERE id=?');
    $sql->execute([$_GET['id']]);
    $serie = $sql->fetch();

    echo $serie['poster'];
}
