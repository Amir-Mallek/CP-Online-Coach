<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/AdminStyle.css">
    <link rel = "stylesheet" href = "css/AddAdminStyle.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Add admin</title>
</head>
<body>
    <div>
        <a href="admin.php" class = "go-back">Go back</a>
    </div>
<div class="container text -centre custom-container">
    <h2 class = "add-admin-header">Add Admin</h2>
    <form>
        <div class="form-group">
            <label for="Name" class = "custom-label">Name</label>
            <input type="text" class="form-control custom-input" id="Name">
        </div>
        <div class="form-group">
            <label for="Last Name" class ="custom-label">Last Name</label>
            <input type="text" class="form-control custom-input" id="Last Name">
        </div>
        <div class="form-group">
            <label for="Email" class = "custom-label">Email</label>
            <input type="email" class="form-control custom-input" id="Email">
        </div>
        <div class="form-group">
            <label for="Phone-number" class = "custom-label">Phone Number</label>
            <input type="number" class="form-control custom-input no-suffix-icon" id="Phone-number" max = "99999999">
        </div>
    </form>
    <div class="row d-flex justify-content-center">
        <button type="button" class="btn btn-dark custom-btn">Add</button>
    </div>
</div>
<script src = "js/AddAdmin.js"></script>
</body>
</html>