<?php
$dsn = "mysql:dbname=etu_tduthil;host=info-titania";
$user = 'tduthil';
$password = 'fVcFs7p3';
$pdo = new PDO($dsn, $user, $password);
$pdo->query('SET CHARSET UTF8');
session_start();
if (!isset($_SESSION['name'])) {
    header('location: /TD5/site.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Base de données</title>
</head>

<body style="background-color : black;">
    <!--<?php
        $sql = "SELECT title FROM series WHERE title LIKE 'L%' ";
        $query = $pdo->query($sql);
        foreach ($query as $row) {
            echo 'Nom : ' . $row['title'] . "<br>";
        }
        ?>-->
    <form method="POST" action="result_form.php">
        <input type="text" placeholder="Nom de la série" name="nom" required>
        <input type="submit" value="send">
    </form>
    <?php
    class Series
    {
    }
    $parPage = 12;

    if (isset($_GET['page'])) {
        if ($_GET['page'] > 0 && $_GET['page'] < 19) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    } else {
        $currentPage = 1;
    }
    $limit = $pdo->prepare("SELECT * FROM series LIMIT :premier, :parpage");
    $limit->bindValue(':premier', ($currentPage - 1) * $parPage, PDO::PARAM_INT);
    $limit->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $limit->execute();
    $limit->setFetchMode(PDO::FETCH_CLASS, Series::class); ?>
    <a href="/TD5/logout.php" style="color:white; text-decoration:none; font-weight:bold;">Déconnexion</a>
    <ul style="display : flex; justify-content : space-between;">
        <li>
            <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage - 1 ?>">Précédente</a>
        </li>
        <li>
            <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage + 1 ?>">Suivante</a>
        </li>
    </ul>
    <div style="display:flex; flex-wrap:wrap;  justify-content : space-between; ">
        <?php while ($row =  $limit->fetch()) { ?>

            <div style="text-align : center; margin : 1rem; background-color: #424242; color: white;">
                <img style="width: 200px; height: 300px; border: solid 5px #272322; border-radius : 2%" src='poster.php?id=<?= $row->id ?>'>
                <p><?= $row->title ?></p><br>
                <a href="/TD5/like.php?id=<?=$row->id?>"><img src="https://img.icons8.com/small/16/000000/hearts.png" style="width: 50px;"/></a>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>