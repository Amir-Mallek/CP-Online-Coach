<?php
    echo"<!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"stylesheet\" href=\"css/all.min.css\">
        <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
        <link rel=\"stylesheet\" href=\"css/AdminStyle.css\">
        <link rel = \"stylesheet\" href = \"css/AddAdminStyle.css\">
        
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        <link href=\"https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap\" rel=\"stylesheet\">
        <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0\" />
        <title>Add admin</title>
    </head>
    <body>";
    echo "<div> \n
    <a href=\"admin.php\" class = \"go-back\">Go back</a> \n
    </div>\n
    <div class=\"container  custom-container\">\n
    <h2 class = \"add-admin-header\">$pageName</h2>\n
    <form>\n";

    foreach($inputFileds as $field){
        $id = $field['id'];
        $type = $field['type'];
        $class = "form-control custom-input";
        if($type == "number"){
            $class .= " no-suffix-icon";
        }
        if($type == "textarea"){
            echo "<div class=\"form-group\">\n
            <label for=\"$id\" class = \"custom-label\">$id</label>\n
            <textarea class=\"$class\" id=\"$id\" rows = \"5\"></textarea>\n
            </div>\n";
            continue;
        }
    echo "<div class=\"form-group\">\n
    <label for=\"$id\" class = \"custom-label\">$id</label>\n
    <input type=\"$type\" class=\"$class\" id=\"$id\">\n
    </div>\n";
    }
    echo "</form>\n";
    echo "<div class = \"row d-flex justify-content-center\"> \n
    <button type=\"button\" class=\"btn btn-dark custom-btn\">$buttonName</button>\n
    </div>\n";   
    echo"</div>\n";

?>