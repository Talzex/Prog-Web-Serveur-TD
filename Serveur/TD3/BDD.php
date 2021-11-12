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
    <title>Base de données</title>
</head>

<body>
    <!--<?php
    $sql = "SELECT title FROM series WHERE title LIKE 'L%' ";
    $query = $pdo->query($sql);
    foreach ($query as $row) {
        echo 'Nom : ' . $row['title'] . "<br>";
    }
    ?>-->

    <form method="POST" action="result_form.php">
        <input type="text"  placeholder = "Nom de la série"name="nom" required >
        <input type="submit" value="send">
    </form>

    <?php 
    class Series
    {
    }

    $sql = $pdo->query("SELECT * FROM series LIMIT 15");
    $sql->setFetchMode(PDO::FETCH_CLASS, Series::class);
    while($row =  $sql->fetch()){ ?>
        <div style="display: flex;flex-wrap:wrap;">
            <p><?= $row->title ?></p><br>
            <img style="width: 200px;" src='poster.php?id=<?= $row->id ?>'>
        </div>
        
        
        
    <?php }
    ?>




</body>

</html>