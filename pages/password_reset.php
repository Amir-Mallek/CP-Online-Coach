<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="\CP-Online-Coach\assets\css\password_reset.css">
</head>
<body>
    <div class="box">
        <h1 class="title">
            Password Recovery
        </h1>
        <form action="\CP-Online-Coach\pages\send_reset_mail.php" method='POST'>
            <div class="input-group">
                <label for="emailreset"> Enter your email to reset your password </label>
                <input id="emailreset" name="emailreset" type="email">
            </div>
            <?php
                    if (isset($_GET['user']) ) {
                    ?>
                        <span id="error-message" style="color:#fff;font-size: 88%;text-align: center;padding-bottom: 15px;"> This email doesn't refer to any account </span>
                    <?php } else { ?>
                        <span id="error-message"></span>
                    <?php }?>
            <button class="next" type="submit" >Next</button>
        </form>
    </div>
</body>
</html>