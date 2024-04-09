<?php
session_start();
$user=11;
require_once('../includes/DB_Connexion.php');
$db=DB_Connexion::getInstance();
$user=11;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
        $upload_dir = "../profile_images/";
        $filename = $_FILES["profile_image"]["name"];
        $tempname = $_FILES["profile_image"]["tmp_name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $newfilename = uniqid() . $extension;

        if (move_uploaded_file($tempname, $upload_dir . $newfilename)) {

            // Update user's photo in the database (replace this with your database update code)
            $query=$db->prepare("update public.user set image_name = ? where id=?");
            $query->execute(array($newfilename,$user));


            // Display a success message
            $_SESSION['success_message'] = "Profile photo updated successfully.";
        } else {
            // Display an error message
            $_SESSION['error_message'] = "Failed to upload photo.";
        }
    } else {
        // Display an error message if no file was selected
        $_SESSION['error_message'] = "Please select a file.";
    }

    // Redirect back to the settings page
    header("Location: http://localhost/cp-application/pages/settings.php");
}
else{
    echo  htmlspecialchars("error");
}
?>
