<?php    
$db_connection = new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres','postgres.smtyqkucrdolnrkzwqjp','ezLz72hM(dJv!@E');
$email=$_GET['mail'];
if (isset($_POST['password']) && isset($_POST['confirm-pass'])){
    $password=$_POST['password'];
    $confirmation=$_POST['confirm-pass'];
    $password_matching=$password==$confirmation;}
else{
    $password_matching=true;
}

if($password_matching && isset($_POST['password']) && isset($_POST['confirm-pass']) && isset($_POST['mail'])){
    //update password in database
    $new_password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email=$_POST['mail'];
    $sql = $db_connection->prepare("UPDATE postgres.public.user SET password = ? WHERE email = ?");
    $values=array($new_password, $email);
    $sql->execute($values);
    header("location:login.php?reset=successfull");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
</head>
<body>
    <div class="reset">
            <h1 class="title"> Reset your password </h1>
            <form action="reset.php?mail='.<?php echo urlencode($email);?>.'" method="post">
                <input type="hidden" name="mail" value="<?php echo htmlspecialchars($email); ?>">
                <div class="input-group">
                    <label for="password">Enter your new password </label>
                    <input type="password" id="password" name="password" required>
                    <?php if(isset($_POST['password'])) $password = (string) $_POST['password'];?>
                </div>
                <div class="input-group">
                    <label for="confirm-pass">Confirm the Password </label>
                    <input type="password" id="confirm-pass" name="confirm-pass" required>
                </div>
                    <?php
                    if (!$password_matching) {
                    ?>
                        <span id="error-message"> Passwords don't match </span>
                    <?php } else { ?>
                        <span id="error-message"></span>
                    <?php }?>
                <button  type="submit">Reset</button>
            </form>
</body>
</html>
