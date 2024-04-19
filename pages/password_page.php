<!DOCTYPE html>
<html lang="en">
<?php
require_once '../auto_load.php';
require_once('../includes/DB_Connexion.php');
$db=DB_Connexion::getInstance();
require_once '../includes/userChecker.php';
$user=$user_id;
function userinfo($champ)
{
    global $db,$user;
    $query = "SELECT $champ FROM public.user WHERE id= $user";
    $result = $db->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo isset($row[$champ]) ? htmlspecialchars($row[$champ]) : '';
}

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <?php link_bootstrap_style(); ?>
    <link rel="stylesheet" href="../assets/css/settings.css">
    <title>Settings</title>

</head>
<body style="margin-top:4%;">
<?php require_navbar(); ?>
<header class="  text-white text-center">
    <div class="container" style="height: 606px;">

        <div class="row" style="height: 100%">
            <div class="col-sm-4" style="text-align: left; position: relative" >
                <div type="image" class="image-container" >

                    <img id="profile" class="mb-5 profile-image" onerror="this.src='https://scontent.fnbe1-2.fna.fbcdn.net/v/t1.6435-9/31494307_924010611103448_7906677145714294784_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=O6cqlnbIGsoAX-8RC4o&_nc_ht=scontent.fnbe1-2.fna&oh=00_AfAqEXoNqTy21s6b3zkOVDZXg9CYWMonXSg_vgEZ9AHvfg&oe=662AD05F'" src="../profile_images/<?php echo htmlspecialchars(userinfo("image_name")); ?>" alt="Profile Image">
                    <label for="profile-upload" style="visibility: hidden">
                        <input type="image"  alt="" id="profile-upload" style="display: none;" accept="image/*" onchange="modifyimage(event)">
                        <svg id="camera" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera hover-image" viewBox="-16 -16 50 50" >
                            <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                            <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>

                    </label>
                </div>


                <div class="d-flex align-items-start" style="margin-left: 12%">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a href="settings.php" class="nav-link btn "aria-selected="false" >Account</a>
                        <a class="nav-link active " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Password</a>
                        <a href="contactUs.php" class="nav-link btn "aria-selected="false" >Support</a>
                        <a href="logout.php" class="nav-link btn "aria-selected="false" >Logout</a>
                    </div>

                </div>
            </div>
            <!--            <div class="col-sm-2"></div>-->
            <div class="col-sm-5">
                <form class="form" action="../includes/modify_password.php" method="post">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label class="form-label custom-text">Current Password </label>
                            <input type="password" name="old_password" class="form-control custom-input-bg " id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label custom-text">New Password </label>
                            <input type="password" name="new_password" class="form-control custom-input-bg " id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label custom-text">Confirm Password </label>
                            <input type="password" name="confirm_password" class="form-control custom-input-bg " id="exampleInputPassword1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btncolor">Submit</button>
                </form>
                <br>
                <br>
                <?php if (isset($_SESSION['pasw_message'])) {
    echo "<div  >" . $_SESSION['pasw_message'] . "</div>";
    unset($_SESSION['pasw_message']);} // Clear the session variable
     //echo password_hash("123", PASSWORD_DEFAULT);     ?>

            </div>

        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>




