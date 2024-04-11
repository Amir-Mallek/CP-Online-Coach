<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: http://localhost:8000/pages/login.php");
    exit;
}
$user_id = $_SESSION['user_id'];

