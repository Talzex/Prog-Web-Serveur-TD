<?php
if (!isset($_SESSION['id'])) {
    header('location: ../TD5/connexion.php');
    $_SESSION['pageprec'] = $_SERVER["REQUEST_URI"];
}
