<?php
include('../bdd_path.php');
$title = 'Inscription';
include('../head.php');
include('../navbar.php');
if (isset($_SESSION['id'])) {
    header('location: connecte.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<body>
    <h1 class="text-center">Inscription</h1>
    <div class="d-flex justify-content-center">
        <form method="POST">
            <input type="text" class="form-control m-3" placeholder="Nom" name="nom" required>
            <input type="email" class="form-control m-3" placeholder="E-mail" name="email" required>
            <input type="password" class="form-control m-3" placeholder="Mot de passe" name="mdp" required>
            <select name="pays" required class="m-3 form-select">
                <option selected disabled>Veuillez choisir un pays</option>
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
            <input type="text" placeholder="Autre..." name="otherCountry">
            <input type="submit" value="Créer un compte" class="m-3 btn btn-primary">
        </form>
    </div>
    <?php
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['pays'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = sha1($_POST['mdp']);
        $date = date('Y-m-d H:i:s');
        $admin = 0;
        $pays = $_POST['pays'];
        $sql = $pdo->prepare("INSERT INTO user (name,email,password,register_date,admin,country_id) VALUES (?,?,?,?,?,?)");
        $sql->execute([$nom, $email, $mdp, $date, $admin, $pays]);
        header('location: /TD5/connexion.php');
    }
    ?>

</body>

</html>