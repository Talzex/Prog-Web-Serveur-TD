<?php
$pages = [
1 => ["multiplications"],
2 => ["calculatrice", "calendrier"]
]
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>TD PHP</title>
    <link rel="stylesheet" href="sytle.css">
</head>

<body>
    <nav>
    <?php
        foreach($pages as $k => $page){ ?>
        <?php foreach($page as $t){ ?>
            <p>TD<?= $k ?> : <a href='/TD<?= $k ?>/<?= $t ?>.php'><?=$t?></a></p>
        <?php }} ?>

    </nav>

</body>

</html>