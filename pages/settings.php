<!DOCTYPE html>
<html lang="en">
<?php
require_once '../auto_load.php';
require_once '../includes/userChecker.php';
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
<body>
<?php require_navbar(); ?>

<header class="  text-white text-center">
    <div class="container ">

        <div class="row">
            <div class="col-sm-4" style="text-align: left; position: relative" >
                <div type="image" class="image-container" >

                    <img id="profile" class="mb-5 profile-image" onerror="this.src='https://scontent.fnbe1-2.fna.fbcdn.net/v/t1.6435-9/31494307_924010611103448_7906677145714294784_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=O6cqlnbIGsoAX-8RC4o&_nc_ht=scontent.fnbe1-2.fna&oh=00_AfAqEXoNqTy21s6b3zkOVDZXg9CYWMonXSg_vgEZ9AHvfg&oe=662AD05F'" src="../profiles_images/<?php echo htmlspecialchars(userinfo("image_name")); ?>" alt="Profile Image">
                    <form action="../includes/modify-image.php" method="post" enctype="multipart/form-data">
                        <?php if (isset($_SESSION['success_message'])) {
                            echo "<span  class='custom-text text-center' style='font-size: x-small'> " . $_SESSION['success_message'] . "</span>";
                            unset($_SESSION['success_message']);} // Clear the session variable
                        ?><?php if (isset($_SESSION['error_message'])) {
                            echo "<span  class='custom-text text-center' style='font-size: x-small'>" . $_SESSION['error_message'] . "</span>";
                            unset($_SESSION['error_message']);} // Clear the session variable
                        ?>
                    <label for="profile-upload">

                            <input type="file" name="profile_image" alt="" id="profile-upload" style="display: none;" accept="image/*" onchange='modifyimage(event)'>
                        <svg id="camera" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera hover-image" viewBox="-16 -16 50 50" >
                            <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                            <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                            <button type="submit" class="btn btnchange" id="imagebtn" style="background-color: #262E33!important;
    color: #BFA181!important;
    border-color: #BFA181!important;
    position: absolute;!important; top:103% !important;margin-left: 22.5% !important;font-size: small!important; visibility: hidden!important">Save changes</button>

                    </label>

                    </form>
                </div>


                <div class="d-flex align-items-start" style="margin-left: 12%">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account</button>
                        <a href="password_page.php" class="btn nav-link "  aria-selected="false" role="tab" aria-controls="v-pills-home">Password</a>
                        <a href="contactUs.php" class="nav-link btn "aria-selected="false" >Support</a>
                        <a href="logout.php" class="nav-link btn "aria-selected="false" >Logout</a>
                    </div>

                </div>
            </div>

            <div class="col-sm-5">
                <form class="form" action="../includes/modify_settings.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label custom-text ">Email address</label>
                        <input type="email" class="form-control custom-input-bg" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php userinfo("email");
                        ?>">
                        <div id="emailHelp" class="form-text " style="color : white">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label custom-text">Name</label>

                        <div class="input-group">
                            <input type="text"   name="username" class="form-control custom-input-bg" id="name"  value="<?php userinfo("username"); ?> ">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label custom-text">Codeforces profile link
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="code-forces" width="20" height="20">
                                <path fill="#F44336" d="M24 19.5V12a1.5 1.5 0 0 0-1.5-1.5h-3A1.5 1.5 0 0 0 18 12v7.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5z"></path>
                                <path fill="#2196F3" d="M13.5 21a1.5 1.5 0 0 0 1.5-1.5v-15A1.5 1.5 0 0 0 13.5 3h-3C9.673 3 9 3.672 9 4.5v15c0 .828.673 1.5 1.5 1.5h3z"></path>
                                <path fill="#FFC107" d="M0 19.5c0 .828.673 1.5 1.5 1.5h3A1.5 1.5 0 0 0 6 19.5V9a1.5 1.5 0 0 0-1.5-1.5h-3C.673 7.5 0 8.172 0 9v10.5z"></path>
                            </svg>
                        </label>

                        <div class="input-group">
                            <input type="text" name="codeforces_acc" class="form-control custom-input-bg" id="codeforces" aria-describedby="emailHelp" value="<?php userinfo("codeforces_acc");
                            ?>">


                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label custom-text">leetcode profile link
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="leetcode"  width="20" height="20"><path fill="#B3B1B0" d="M22 14.355c0-.742-.564-1.346-1.26-1.346H10.676c-.696 0-1.26.604-1.26 1.346s.563 1.346 1.26 1.346H20.74c.696.001 1.26-.603 1.26-1.346z"></path><path fill="#E7A41F" d="m3.482 18.187 4.313 4.361c.973.979 2.318 1.452 3.803 1.452 1.485 0 2.83-.512 3.805-1.494l2.588-2.637c.51-.514.492-1.365-.039-1.9-.531-.535-1.375-.553-1.884-.039l-2.676 2.607c-.462.467-1.102.662-1.809.662s-1.346-.195-1.81-.662l-4.298-4.363c-.463-.467-.696-1.15-.696-1.863 0-.713.233-1.357.696-1.824l4.285-4.38c.463-.467 1.116-.645 1.822-.645s1.346.195 1.809.662l2.676 2.606c.51.515 1.354.497 1.885-.038.531-.536.549-1.387.039-1.901l-2.588-2.636a4.994 4.994 0 0 0-2.392-1.33l-.034-.007 2.447-2.503c.512-.514.494-1.366-.037-1.901-.531-.535-1.376-.552-1.887-.038l-10.018 10.1C2.509 11.458 2 12.813 2 14.311c0 1.498.509 2.896 1.482 3.876z"></path><path fill="#070706" d="M8.115 22.814a2.109 2.109 0 0 1-.474-.361c-1.327-1.333-2.66-2.66-3.984-3.997-1.989-2.008-2.302-4.937-.786-7.32a6 6 0 0 1 .839-1.004L13.333.489c.625-.626 1.498-.652 2.079-.067.56.563.527 1.455-.078 2.066-.769.776-1.539 1.55-2.309 2.325-.041.122-.14.2-.225.287-.863.876-1.75 1.729-2.601 2.618-.111.116-.262.186-.372.305-1.423 1.423-2.863 2.83-4.266 4.272-1.135 1.167-1.097 2.938.068 4.127 1.308 1.336 2.639 2.65 3.961 3.974.067.067.136.132.204.198.468.303.474 1.25.183 1.671-.321.465-.74.75-1.333.728-.199-.006-.363-.086-.529-.179z"></path></svg>
                        </label>

                        <div class="input-group">
                            <input type="text"  name="leetcode_acc" class="form-control custom-input-bg" id="leetcode" aria-describedby="emailHelp" value="<?php userinfo("leetcode_acc");
                            ?>">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label custom-text">linkedin profile link
                            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 128 128" id="linkedin" width="30" height="30"><<path fill="#fff" d="M92 32H36a4 4 0 0 0-4 4v56a4 4 0 0 0 4 4h56a4 4 0 0 0 4-4V36a4 4 0 0 0-4-4ZM52 86H42V56h10Zm-5-34a6 6 0 1 1 6-6 6 6 0 0 1-6 6Zm39 34H76V66c0-1.66-2.24-3-5-3-4 0-5 5.34-5 7v16H56V56h10v7c0-5 4.48-7 10-7a10 10 0 0 1 10 10Z"></path></svg>
                        </label>

                        <div class="input-group">
                            <input type="text"  name="linkedin_acc" class="form-control custom-input-bg" id="linkedin" aria-describedby="emailHelp" value="<?php userinfo("linkedin_acc");
                            ?>">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label custom-text">Github link
                        </label>
                        <div class="input-group">
                            <input type="text"  name="linkedin_acc" class="form-control custom-input-bg" id="github" aria-describedby="emailHelp" value="<?php userinfo("github_acc");
                            ?>">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btncolor">Submit</button>
                </form>
            </div>

        </div>
    </div>
</header>
<script>function modifyimage(event) {
        const profile = document.getElementById("profile");
        const btn = document.getElementById("imagebtn");

        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            profile.src = reader.result;
        };

        reader.readAsDataURL(input.files[0]);
        btn.style.visibility = "visible"; // Show the submit button when an image is selected
    }</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/Settings_script.js"></script>
</body>

</html>




