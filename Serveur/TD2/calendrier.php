<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Calendrier</title>
</head>
<?php
        $jour = date('d'); //numéro du jour dans le mois
        $mois = date('m'); // numéro du mois dans l'année
        $year = date('o');
        $semaine = date('W',mktime(0,0,0,$mois,$jour,$year)); // numéro de la semaine dans l'année
        $jourdelasemaine = date('N',mktime(0,0,0,$mois,$jour,$year)); // De 1 à 7, actuelle
        $premierjourdumois = date('N', mktime(0,0,0,$mois,1,$year));

        echo $premierjourdumois;
        ?>
<body>
    <table>

        <tr>
            <th>/</th>
            <th>lun.</th>
            <th>mar.</th>
            <th>mer.</th>
            <th>jeu.</th>
            <th>ven.</th>
            <th>sam.</th>
            <th>dim.</th>
        </tr>
        <?php
            for ($i=1;$i <= 6; $i++){?>
                <tr>
                    <?php
                        for ($j=1;$j <= 8; $j++){?>
                            <?php
                            if($j == 1){?>
                                <th><?=$semaine?></th>
                                <?php $semaine++ ?>
                            <?php } else { ?>
                                <td><?=$jour?></td>
                            <?php } ?>
                    <?php } ?>
                </tr>
            <?php } ?>

    </table>
</body>

</html>