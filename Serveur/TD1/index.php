<?php
$pages = ["multiplications"];
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
        foreach ($pages as $page)
            echo "<a href='$page.php'>$page</a>"

        ?>
    </nav>

</body>

</html>