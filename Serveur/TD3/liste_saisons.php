<?php
include('../bdd_path.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php
        if (isset($_GET['id'])) {
            
            $req = $pdo->prepare('SELECT season.number, COUNT(episode.id)
                                FROM episode INNER JOIN season ON season.id = episode.season_id 
                                WHERE season.series_id=? GROUP BY season_id ORDER BY season.number ASC');
            $req->execute([$_GET['id']]);

            $req2 = $pdo->prepare('SELECT * FROM series WHERE id=?');
            $req2->execute([$_GET['id']]);
            $serie = $req2->fetch();

            echo "<p>" . $serie['title'] . "</p>";
            while($saisons = $req->fetch()){
                echo "<li>Saison ".$saisons[0]. "(" .$saisons[1]. " épisodes )</li>";
            }
        }
        ?>
    </ul>

</body>

</html>