
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/AdminStyle.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="d-flex flex-column col-2 ">
            <div class="p-2 flex-item test m-5 mb-3 rounded-circle icon-container ">
                <a href="AddAdmin.php">
                <span class="material-symbols-outlined icon">
        group_add
        </span>
        </a>
        <div class="discription">Add Admin</div>    
        </div>
            <div class="p-2 flex-item  test m-5 mt-2 mb-3">
                <a href="RemoveAdmin.php">
                <span class="material-symbols-outlined icon">
                person_remove
        </span>
                </a>
                <div class="discription">Remove Admin</div>
        </div>
            <div class="p-2 flex-item test m-5 mt-2 mb-3"><a href="AddLevel.php">
            <span class="material-symbols-outlined icon">
        add
        </span>
            </a>
            <div class="discription">Add Level</div>
        </div>
            <div class = "p-2 flex-item test m-5 mt-2 mb-3"><a href="levels.php">
            <span class="material-symbols-outlined icon">
        build
        </span>
            </a>
            <div class="discription ">Edit Level</div>
        </div>

        
    </div>
</div>
<script src = "Admin.js"></script>
</body>

</html>