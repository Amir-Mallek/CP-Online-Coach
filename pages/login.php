<?php
    $db_connection = new PDO('pgsql:host=aws-0-eu-central-1.pooler.supabase.com;dbname=postgres','postgres.smtyqkucrdolnrkzwqjp','ezLz72hM(dJv!@E');
    if(isset($_SESSION['user_id'])){
        header("location:\CP-Online-Coach\index.php");
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="\CP-Online-Coach\assets\css\login.css">
</head>


<body>
    <?php
    if (isset($_GET['account_created']) && $_GET['account_created']==true){
        echo '<script>';
        echo 'var alertBox = document.createElement("div");';
        echo 'alertBox.innerHTML = "Congratulations. Your account is created successfully";';
        echo 'alertBox.style.backgroundColor = "#061A26";';  
        echo 'alertBox.style.width = "60%";';  
        echo 'alertBox.style.color = "#BFA181";';            
        echo 'alertBox.style.border = "1px solid #f5c6cb";'; 
        echo 'alertBox.style.padding = "8px";';              
        echo 'alertBox.style.marginBottom = "16px";';        
        echo 'alertBox.style.top = "20px";';             
        echo 'alertBox.style.position = "fixed";';
        echo 'document.body.appendChild(alertBox);';         
        echo 'setTimeout(function() {';
        echo '    alertBox.style.display = "none";';        
        echo '    window.location.href = "/CP-Online-Coach/pages/login.php";';                                
        echo '}, 3000);'; 
        echo '</script>';
        
    }

    
    if (isset($_GET['sent']) && $_GET['sent']=='successfull'){
        echo '<script>';
        echo 'var alertBox = document.createElement("div");';
        echo 'alertBox.innerHTML = "Check your mail to reset password";';
        echo 'alertBox.style.backgroundColor = "#061A26";';  
        echo 'alertBox.style.width = "60%";';  
        echo 'alertBox.style.color = "#BFA181";';            
        echo 'alertBox.style.border = "1px solid #f5c6cb";'; 
        echo 'alertBox.style.padding = "8px";';              
        echo 'alertBox.style.marginBottom = "16px";';        
        echo 'alertBox.style.top = "20px";';             
        echo 'alertBox.style.position = "fixed";';
        echo 'document.body.appendChild(alertBox);';         
        echo 'setTimeout(function() {';
        echo '    alertBox.style.display = "none";';        
        echo '    window.location.href = "/CP-Online-Coach/pages/login.php";';                                
        echo '}, 3000);'; 
        echo '</script>';
        
    }

    if (isset($_GET['reset']) && $_GET['reset']=='successfull'){
        echo '<script>';
        echo 'var alertBox = document.createElement("div");';
        echo 'alertBox.innerHTML = "Your password has been successfully reset";';
        echo 'alertBox.style.backgroundColor = "#061A26";';  
        echo 'alertBox.style.width = "60%";';  
        echo 'alertBox.style.color = "#BFA181";';            
        echo 'alertBox.style.border = "1px solid #f5c6cb";'; 
        echo 'alertBox.style.padding = "8px";';              
        echo 'alertBox.style.marginBottom = "16px";';        
        echo 'alertBox.style.top = "20px";';             
        echo 'alertBox.style.position = "fixed";';
        echo 'document.body.appendChild(alertBox);';         
        echo 'setTimeout(function() {';
        echo '    alertBox.style.display = "none";';        
        echo '    window.location.href = "/CP-Online-Coach/pages/login.php";';                                
        echo '}, 3000);'; 
        echo '</script>';
        
    }
?>
    <div class="login">
        <h1 class="title"> Login </h1>
        <form action="\CP-Online-Coach\pages\login.php" method="post">
            <div class="input-group">
                <label for="username">Username / Email</label>
                <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
            </div>
            <div class="input-group">
                <label for="password">Password </label>
                <input type="password" id="password" name="password" required>
                <span id="error" class="error-message"></span><br>
                
            </div>
            <button class="login_button" type="submit" style="font-size:100%">Login</button>
        </form>
        <a id="password_forgotten" href="\CP-Online-Coach\pages\password_reset.php"> Forget Password </a> <br>
        <a id="create_account" href="\CP-Online-Coach\pages\signin.php"> Create an account </a>
    </div>
    <?php
    
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {   
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];

    $stmt = $db_connection->prepare("SELECT id, password FROM postgres.public.user WHERE LOWER(username) = :username OR email = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check username or email 
    if ($user) {
        // Verify the entered password against the stored hash
        if (password_verify($password, $user['password'])) {
            // Login successful
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("location:\CP-Online-Coach\index.php");
            /* Page mouhib */
        } else {
            // Passwords don't match, login failed
            $_SESSION['username']=$username;
            echo "<script> 
            const errormsg=document.getElementById('error');
            errormsg.innerHTML='Password is incorrect. Please try again.';
            errormsg.style.color='white';
            errormsg.style.display='inline';
            errormsg.style.textAlign='center';
            </script>";
        }
    } else {
        // No user found with the given username or email
        echo "<script> 
        const errormsg=document.getElementById('error');
        errormsg.innerHTML='User not found. Please try again.';
        errormsg.style.color='white';
        errormsg.style.display='inline';
        errormsg.style.textAlign='center';
        </script>";
    }
}
else{
    echo "<script> 
        const errormsg=document.getElementById('error');
        errormsg.innerHTML=''";
}


    $db_connection=null;
    ?>
    
</body>
</html>
