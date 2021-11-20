<?php
include('../bdd_path.php');
$title = 'Séries';
include('../head.php');
include('../navbar.php');
if (!isset($_SESSION['id'])) {
    header('location: ../index.php');
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
        <input type="text" class="form-control" placeholder="Nom de la série" name="nom" required>
        <input type="submit" class="btn btn-primary" value="send">
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
    <ul style="display : flex; justify-content : space-between;">
        <li>
            <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage - 1 ?>">Précédente</a>
        </li>
        <li>
            <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage + 1 ?>">Suivante</a>
        </li>
    </ul>
    <div style="display:flex; flex-wrap:wrap;  justify-content : space-between; ">

        <?php if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
            $sql = $pdo->query("SELECT series_id FROM user_series WHERE user_id = $user_id");
            $sql->execute();
            $serielike = $sql->fetchAll();
        }
        while ($row =  $limit->fetch()) {
            $liked = false; ?>
            <div id="<?= $row->id ?>" style="text-align : center; margin : 1rem; background-color: #424242; color: white;">
                <img style="width: 200px; height: 300px; border: solid 5px #272322; border-radius : 2%" src='poster.php?id=<?= $row->id ?>'>
                <p><?= $row->title ?></p><br>
                <?php
                foreach ($serielike as $sl) {
                    if ($sl['series_id'] == $row->id) {
                        $liked = true;
                    }
                }
                if ($liked) { ?>
                    <a href="/TD5/like.php?id=<?= $row->id ?>&like=1#<?= $row->id ?>"><img src="https://img.icons8.com/cotton/64/000000/hearts--v2.png" style="width: 50px;" /></a>
                <?php } else { ?>
                    <a href="/TD5/like.php?id=<?= $row->id ?>&like=0#<?= $row->id ?>"><img src="https://img.icons8.com/small/16/000000/hearts.png" style="width: 50px;" /></a>
                <?php } ?>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>