<?php
require_once('../includes/DB_Connexion.php');
$db=DB_Connexion::getInstance();
require_once '../includes/userChecker.php';
$user=$user_id;
$query = $db->prepare("SELECT password FROM public.user WHERE id=?");
$query->execute(array($user));
$hashedPassword = $query->fetch(PDO::FETCH_ASSOC);

if ($hashedPassword && isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $providedPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (password_verify($providedPassword, $hashedPassword['password'])) {
        if ($newPassword === $confirmPassword) {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery = $db->prepare("UPDATE public.user SET password = ? WHERE id = ?");
            $updateQuery->execute(array($hashedNewPassword, $user));
            $_SESSION['pasw_message'] = "Password has been successfully changed!";
        } else {
            $_SESSION['pasw_message'] = "New password and confirm password don't match!";
        }
    } else {
        $_SESSION['pasw_message'] = "Old password is incorrect!";
    }
} else {
    $_SESSION['pasw_message'] = "Missing parameters!";
}

header("Location: ../pages/password_page.php");
exit();
