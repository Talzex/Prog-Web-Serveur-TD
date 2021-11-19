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
    <h1>Inscription</h1>
<form method="POST">
        <input type="text"  placeholder = "Nom" name="nom" required>
        <input type="email" placeholder = "E-mail" name="email" required>
        <input type="password" placeholder = "Mot de passe" name="mdp" required>
        <select name="pays" required>
            <option value="">Veuillez choisir un pays</option>
            <?php 
                $sql = $pdo->query("SELECT * FROM country");
                $sql->execute();
                $options = [];
                foreach ($sql as $s) {
                    $options[$s['id']] =  $s['name'];
                }
                foreach ($options as $key => $value) {
                    echo "<option value='$key'>$value</option>";
                }
            ?>
        </select>
        <input type="submit" value="send">
</form>
    <?php
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['pays'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = sha1($_POST['mdp']);
        $date = date('Y-m-d H:i:s');
        $admin = 0;
        $pays = $_POST['pays'];
        $sql = $pdo->prepare("INSERT INTO user (name,email,password,register_date,admin,country_id) VALUES (?,?,?,?,?,?)");
        $sql->execute([$nom, $email, $mdp,$date,$admin,$pays]);
        }
    ?>
    
</body>
</html>