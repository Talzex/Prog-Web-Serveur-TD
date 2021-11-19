<?php
$dsn = "mysql:dbname=etu_tduthil;host=info-titania";
$user = 'tduthil';
$password = 'fVcFs7p3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');
session_start();
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $req = $pdo->query("SELECT id FROM user WHERE name='$name'");
    $req->execute();
    while($user_id = $req->fetch()){
        if(isset($_GET['id'])){
            $series_id = $_GET['id'];
            $sql = $pdo->query("INSERT INTO user_id VALUES ('$user_id','$series_id')");
        }
    }
}

