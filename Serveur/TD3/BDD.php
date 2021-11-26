<?php
include('../bdd_path.php');
$title = 'Séries';
include('../head.php');
include('../navbar.php');
require_once('../pageprotegee.php');
class Series
{
}
$parPage = 12;
?>
<!DOCTYPE html>
<html lang="fr">

<body style="background-color : black;">
    <form class="d-flex " method="POST" action="result_form.php">
        <input type="text" class="form-control" placeholder="Nom de la série" name="nom" required style="width: 200px;">
        <input type="submit" class="btn btn-primary" value="send">
    </form>
    <form class="d-flex" method="GET">
        <div>
            <label class="text-white">Séries Suivis</label>
            <input type="checkbox" name="voirlike" <?php if (isset($_GET['voirlike'])) { ?> checked<?php } ?>>
            <input type="submit" class="btn btn-primary" value="send">
        </div>
    </form>

    <?php
    if (isset($_GET['page'])) {
        if (isset($_GET['voirlike'])) {
            $user_id = $_SESSION['id'];
            $limit = $pdo->prepare("SELECT COUNT(*) as total
                           FROM series
                           INNER JOIN user_series ON user_series.series_id = series.id
                           WHERE user_series.user_id = $user_id");
        } else {
            $limit = $pdo->prepare("SELECT COUNT(*) as total FROM series ");
        }
        $limit->execute();
        $donnees = $limit->fetch();
        $nbserie =  $donnees['total'];
        $nbpage = ceil($nbserie / $parPage);
        if ($_GET['page'] > 0 && $_GET['page'] < $nbpage) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    } else {
        $currentPage = 1;
    }

    if (isset($_GET['voirlike'])) {
        $user_id = $_SESSION['id'];
        $limit = $pdo->prepare("SELECT *
                       FROM series
                       INNER JOIN user_series ON user_series.series_id = series.id
                       WHERE user_series.user_id = $user_id
                       LIMIT :premier, :parpage");
    } else {
        $limit = $pdo->prepare("SELECT * FROM series LIMIT :premier, :parpage");
    }

    $limit->bindValue(':premier', ($currentPage - 1) * $parPage, PDO::PARAM_INT);
    $limit->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $limit->execute();
    $limit->setFetchMode(PDO::FETCH_CLASS, Series::class);
    ?>

    <ul class="d-flex justify-content-between">
        <?php if (isset($_GET['voirlike'])) { ?>
            <li>
                <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage - 1 ?>&voirlike=on">Précédente</a>
            </li>
            <li>
                <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage + 1 ?>&voirlike=on">Suivante</a>
            </li>
        <?php } else { ?>
            <li>
                <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage - 1 ?>">Précédente</a>
            </li>
            <li>
                <a style="color:white; text-decoration:none; font-weight:bold;" href="BDD.php?page=<?= $currentPage + 1 ?>">Suivante</a>
            </li>
        <?php } ?>
    </ul>

    <div class="d-flex justify-content-between flex-wrap">
        <?php
        $user_id = $_SESSION['id'];
        $sql = $pdo->query("SELECT series_id FROM user_series WHERE user_id = $user_id");
        $sql->execute();
        $serielike = $sql->fetchAll();
        while ($row =  $limit->fetch()) {
            $liked = false; ?>
            <div id="<?= $row->id ?>" class="text-center m-3" style="background-color: #424242; color: white;">
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
        <?php } ?>
    </div>
</body>

</html>