<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/contactUs.css">

</head>
<body>
    
<?php
    if (isset($_GET['sent']) && $_GET['sent']=='successfull'){
        echo '<script>';
        echo 'var alertBox = document.createElement("div");';
        echo 'alertBox.innerHTML = "Your message was successfully sent";';
        echo 'alertBox.style.backgroundColor = "#061A26";';  
        echo 'alertBox.style.width = "60%";';  
        echo 'alertBox.style.color = "#BFA181";';            
        echo 'alertBox.style.border = "1px solid #f5c6cb";'; 
        echo 'alertBox.style.padding = "8px";';              
        echo 'alertBox.style.marginBottom = "16px";';        
        echo 'document.header.appendChild(alertBox);';         
        echo 'setTimeout(function() {';
        echo '    alertBox.style.display = "none";';        
        echo '    window.location.href = "../pages/contactUs.php";';                                
        echo '}, 3000);'; 
        echo '</script>';
        
    }

?>
<div class="contact">
<h1 class="title"> Contact Us</h1>
<form action="send_email.php" method="post">
    <div class="input-group">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required><br>
    </div>
    <div class="input-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required><br>
    </div>
    <div class="input-group">
    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" required><br>
    </div>
    <div class="input-group">
    <label for="message">Message</label><br>
    <textarea id="message" name="message" rows="4" required></textarea><br>
    </div>
    <button type="submit" name="submit">Send</button>
</form>
</div>
</body>
</html>