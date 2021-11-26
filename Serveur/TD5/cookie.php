<?php
include('../bdd_path.php');
$title = 'Cookie';
include('../head.php');
include('../navbar.php');
?>
<!DOCTYPE html>

<body>
    <?php
    if (!isset($_COOKIE['count'])) { 
      echo "Bienvenue! C'est la première fois que vous visitez notre page."; 
      $cookie = 1;
      setcookie("count", $cookie);
    }else{
      $cookie = ++$_COOKIE['count'];
      setcookie("count", $cookie); 
      echo "Vous avez visitez ".$_COOKIE['count']." fois notre site."; 
      }
    ?>
</body>

</html>