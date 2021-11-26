<?php
include('../bdd_path.php');
require_once('../pageprotegee.php');
session_start();
if (isset($_GET['id'])) {
    if (isset($_GET['like'])) {
        $like = $_GET['like'];
        $series_id = $_GET['id'];
        if ($like == 0) {
            $req1 = $pdo->prepare("INSERT INTO user_series (user_id, series_id) VALUES (?,?)");
            $req1->execute([$_SESSION['id'], $series_id]);
        } else {
            $req2 = $pdo->prepare("DELETE FROM user_series WHERE user_id = ? AND series_id = ?");
            $req2->execute([$_SESSION['id'], $series_id]);
        }
        if (isset($_GET['page'])) {
            header('location: /TD3/BDD.php?page=' . $_GET['page'] . '#' . $series_id);
        } else {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
