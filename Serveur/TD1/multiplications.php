<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Multiplications</title>
</head>

<body>
    <?php
    $nb = 9;
    ?>
    <table>
        <?php
        for ($i = 1; $i <= $nb; $i++) { ?>
            <tr>
                <?php
                for ($j = 1; $j <= $nb; $j++) {
                    $mul = $i * $j;
                    if ($i == 1 || $j == 1) {?> 
                        <th <?php if(isset($_GET['nb1']) && isset($_GET['nb2'])){?>
                            <?php if ($i == $_GET['nb1'] || $j == $_GET['nb2']) {?>
                                style="background-color: yellow;"
                                <?php }?>
                              <?php } ?>><?= $mul?></th><?php
                     } else { ?>
                        <td <?php if(isset($_GET['nb1']) && isset($_GET['nb2'])){?>
                                <?php if ($i == $_GET['nb1'] || $j == $_GET['nb2']) {?>
                                    style="background-color: yellow;"
                                    <?php }?>
                                  <?php } ?>>
                        <a href='multiplications.php?nb1=<?= $i?>&nb2=<?= $j?>'>
                            <?= $i * $j ?>
                        </a></td>
                <?php }
                } ?>
            </tr>
        <?php } ?>

    </table>




</body>

</html>