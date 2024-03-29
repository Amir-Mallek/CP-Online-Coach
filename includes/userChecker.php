<?php
session_start();

//just for testing
$_SESSION['user_id'] = 1;


if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}
$user_id = $_SESSION['user_id'];

