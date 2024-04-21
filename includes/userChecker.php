<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $pageName = basename($_SERVER['PHP_SELF']);
    if($pageName=='index.php')
        header("location: pages/login.php");
    else
        header("location: ../pages/login.php");
    exit;
}
$user_id = $_SESSION['user_id'];

