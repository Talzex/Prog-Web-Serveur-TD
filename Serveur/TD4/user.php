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
    <title>Utilisateur</title>
</head>
<body>
<form method="POST">
        <input type="text"  placeholder = "Nom" name="nom" required>
        <input type="email" placeholder = "E-mail" name="email" required>
        <input type="text" placeholder = "Mot de passe" name="mdp" required>
        <input type="submit" value="send">
</form>
<?php
    if (isset($_POST['nom']) && isset($_POST['email']) isset($_POST['mdp'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $sql = $pdo->prepare("");
        $query->execute();
        }
    ?>
    
</body>
</html>