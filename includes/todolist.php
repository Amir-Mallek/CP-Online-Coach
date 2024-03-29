<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Title</title>

    <style>
        .tr {
            background-color: transparent;
            color: white;
            border-bottom: 1px solid #BFA181 ;
        }

        .tr:nth-child(odd) {
            background-color: #178582;
        }
        .primary{
            color: white;
        }
        .checkbox{
            border: none;
        }
        .checkbox:checked {
            background-color: #BFA181; /* Change to desired color */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Example box shadow */
        }
        .checkbox:focus {
            outline: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Example box shadow */
        }
    </style>
</head>
<body>
<div class="table container"></div>
</body>

<script src="../assets/js/ToDoList.js"></script>



<!--    buildTask("Solve 2 problems in Game Theory",undefined,false);-->
<!--    buildTask("Learn about BFS",undefined,true);-->
<!--    buildTask("Problem Watermelon",undefined,false);-->
<!--    buildTask("Participate in DIV2 Codeforces",undefined,true);-->
</html>