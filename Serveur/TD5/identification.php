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
    <title>identification</title>
</head>
<body>
    <h1>Connexion</h1>
<form method="POST">
        <input type="text"  placeholder = "Nom" name="nom" required>
        <input type="password" placeholder = "Mot de passe" name="mdp" required>
        <input type="submit" value="send">
</form>

<?php

    if (isset($_POST['nom']) && isset($_POST['mdp'])) {
        $nom = $_POST['nom'];
        $mdp = sha1($_POST['mdp']);
        $sql = $pdo->prepare("SELECT name FROM user WHERE name=?");
        $sql->execute([$nom]);
        $result = $sql->rowCount();
        if($result != 0){
            $sql = $pdo->prepare("SELECT password FROM user WHERE name=? AND password=?");
            $sql->execute([$nom,$mdp]);
            $result = $sql->rowCount();
            if($result != 0){ 
                $_SESSION['name'] = $sql['name'];
                header('location: connecte.php');
            }
        }
    }?>
    
</body>
</html>