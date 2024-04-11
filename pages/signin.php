<?php
session_start();
$db_connection = new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres','postgres.smtyqkucrdolnrkzwqjp','ezLz72hM(dJv!@E');

//verify password confirmation
$password_matching = true ;
if(isset($_POST['password']) && isset($_POST['password-conf'])){
    $password_matching=$_POST['password-conf'] == $_POST['password'];
}

//verify username uniqueness
$username_uniqueness = true;
if(isset($_POST['username'])){
    $usr=$_POST['username'];
    $sql = "SELECT * FROM postgres.public.user WHERE (username='$usr')";
    $result = $db_connection->query($sql);
    if ($result->rowCount()>0){
        $username_uniqueness = false;
    }
}

//verify email uniqueness
$mail_uniqueness = true;
if(isset($_POST['mail'])){
    $mailadr=$_POST['mail'];
    $sql_mail = "SELECT * FROM postgres.public.user WHERE (email='$mailadr')";
    $result_mail = $db_connection->query($sql_mail);
    if ($result_mail->rowCount()>0){
        $mail_uniqueness = false;
    }
}

$post= isset($_POST['password-conf']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['mail']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['surname'] = isset($_POST['surname']) ? $_POST['surname'] : '';
    $_SESSION['mail'] = (isset($_POST['mail']) && $mail_uniqueness) ? $_POST['mail'] : '';
    $_SESSION['username'] = (isset($_POST['username']) && $username_uniqueness) ? $_POST['username'] : '';
    $_SESSION['codeforces'] = isset($_POST['codeforces']) ? $_POST['codeforces'] : '';
    $_SESSION['leetcode'] = isset($_POST['leetcode']) ? $_POST['leetcode'] : '';
    $_SESSION['github'] = isset($_POST['github']) ? $_POST['github'] : '';
    $_SESSION['linkedin'] = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';
}



if ($password_matching && $username_uniqueness && $mail_uniqueness && $post) {
    
    //insert data
    $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name=trim($_POST['name']);
    $surname=trim($_POST['surname']);
    $mail=strtolower(trim($_POST['mail']));
    $username=trim($_POST['username']);
    $codeforces=trim($_POST['codeforces']);
    $leetcode=trim($_POST['leetcode']);
    $github=trim($_POST['github']);
    $linkedin=trim($_POST['linkedin']);
    $new_file_name='default.png';
    //Save Uploaded Image 
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_name = $_FILES['photo']['name'];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name=uniqid().'.'.$file_extension;
        $upload_directory="../profiles_images/";
        move_uploaded_file($file_tmp, $upload_directory.$new_file_name);
    }
    $sql_insert = "INSERT INTO postgres.public.user(name,surname,email,username,password,codeforces_acc,leetcode_acc,github_acc,linkedin_acc,image_name) 
            VALUES ('$name','$surname','$mail','$username','$pass','$codeforces','$leetcode','$github','$linkedin','$new_file_name')";
    $result_insert = $db_connection->query($sql_insert);
    
    
    unset($_SESSION['name']);
    unset($_SESSION['surname']);
    unset($_SESSION['mail']);
    unset($_SESSION['username']);
    unset($_SESSION['codeforces']);
    unset($_SESSION['leetcode']);
    unset($_SESSION['github']);
    unset($_SESSION['linkedin']);
    session_destroy();
    header("location:login.php?account_created=true");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="../assets/css/signin.css">
</head>

<body>
    <div class="signin">
        <h1 class="title"> Sign Up </h1>
        <form action="signin.php" id="signup-form" method="POST" enctype="multipart/form-data" >
            <div class="input-group">
                <label for="name">Name*</label>
                <input id="name" name="name" type="text" required value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="surname">Surname*</label>
                <input id="surname" name="surname" type="text" required value="<?php echo isset($_SESSION['surname']) ? $_SESSION['surname'] : ''; ?>">
            </div>
            <div id="input-email" class="input-group">
                <label for="mail">Email*</label>
                <input id="mail" name="mail" type="email" required value="<?php echo isset($_SESSION['mail']) ? $_SESSION['mail'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="username">Username*</label>
                <input id="username" name="username" type="text" required value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="password">Create Password*</label>
                <input id="password" name="password" type="password" required>
            </div>
            <div class="input-group">
                <label for="password-conf">Confirm Password*</label>
                <input id="password-conf" name="password-conf" type="password" required>
            </div>
            <div class="input-group">
                <label for="codeforces">Codeforces Link</label>
                <input id="codeforces" name="codeforces" type="text" value="<?php echo isset($_SESSION['codeforces']) ? $_SESSION['codeforces'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="leetcode">LeetCode Link</label>
                <input id="leetcode" name="leetcode" type="text" value="<?php echo isset($_SESSION['leetcode']) ? $_SESSION['leetcode'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="github">GitHub Link</label>
                <input id="github" name="github" type="text" value="<?php echo isset($_SESSION['github']) ? $_SESSION['github'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="linkedin">LinkedIn Link</label>
                <input id="linkedin" name="linkedin" type="text" value="<?php echo isset($_SESSION['linkedin']) ? $_SESSION['linkedin'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="photo">Insert your photo</label>
                <div class="photo-container">
                    <span id="photo-span">Choose File</span>
                    <input id="photo" type='file' name='photo' accept=".jpg, .jpeg, .png" >
                </div>
            </div>
            <?php
            if(!$mail_uniqueness){?>
                <span id="error-message"> Email Adress already exists <a href="login.php" style="color:#BFA181;">Log in</a> </span>
            <?php
            }
            else{
                if(!$username_uniqueness){ ?>
                <span id="error-message"> Username already exists <a href="login.php" style="color:#BFA181; ">  Log in</a> </span>
            <?php
            }
            else{
            if (!$password_matching) {
            ?>
                <span id="error-message"> Passwords don't match </span>
            <?php } else { ?>
                <span id="error-message"></span>
            <?php }} }?>
            <button class="signin_button" type="submit">Sign Up</button>
        </form>

    </div>
</body>

</html>


