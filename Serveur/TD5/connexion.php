<?php
include('../bdd_path.php');
$title = 'PHP';
include('../head.php');
include('../navbar.php');
?>
<!DOCTYPE html>
<html lang="fr">

<body>

    <h1 class="text-center">Connexion</h1>
    <div class="d-flex justify-content-center">
        <form method="POST">
            <input type="text" class="form-control m-3" placeholder="Nom" name="nom" required>
            <input type="password" class="form-control m-3" placeholder="Mot de passe" name="mdp" required>
            <input type="submit" value="Connexion" class="m-3 btn btn-primary text-center">
            <a href="/TD4/inscription.php">Pas de compte ?</a>
        </form>
        
    </div>
    
    <?php
    if (isset($_POST['nom']) && isset($_POST['mdp'])) {
        $nom = $_POST['nom'];
        $mdp = sha1($_POST['mdp']);
        $sql = $pdo->prepare("SELECT name FROM user WHERE name=?");
        $sql->execute([$nom]);
        $result = $sql->rowCount();
        if ($result != 0) {
            $sql = $pdo->prepare("SELECT * FROM user WHERE name=? AND password=?");
            $sql->execute([$nom, $mdp]);
            $result = $sql->rowCount();
            if ($result != 0) {
                $u = $sql->fetch();
                $_SESSION['id'] = $u['id'];
                if(isset($_SESSION['pageprec'])){
                    header('location:' . $_SESSION['pageprec']);
                } else {
                    header('location: connecte.php');
                }
                
            }
        }
    } ?>

</body>

</html>