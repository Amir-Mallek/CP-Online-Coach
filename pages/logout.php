<?php
session_start();
unset($_SESSION["user_id"]);
header("Location: http://localhost:8000/pages/login.php");
exit();