<?php
session_start();
$db_connection = new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres','postgres.smtyqkucrdolnrkzwqjp','ezLz72hM(dJv!@E');
    
//verify password confirmation
$password_matching = (isset($_POST['password']) && isset($_POST['password-conf'])) ? $_POST['password-conf'] == $_POST['password'] : true ;

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


if ($password_matching && $username_uniqueness && $mail_uniqueness) {
    //insert data
    $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $mail=$_POST['mail'];
    $username=$_POST['username'];
    $codeforces=$_POST['codeforces'];
    $leetcode=$_POST['leetcode'];
    $github=$_POST['github'];
    $linkedin=$_POST['linkedin'];
    

    $sql_insert = "INSERT INTO postgres.public.user(name,surname,email,username,password,codeforces_acc,leetcode_acc,github_acc,linkedin_acc) 
    VALUES ('$name','$surname','$mail','$username','$pass','$codeforces','$leetcode','$github','$linkedin')";
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

