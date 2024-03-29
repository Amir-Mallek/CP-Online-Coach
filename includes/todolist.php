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

<script>
    const tasksList =document.querySelector('.table');

    /**
     * Build a task for the To-Do List
     *
     * @param {string} taskContent - The content of the task.
     * @param {string} problemLink - The link of the problem in case the task is to complete a certain problem.
     */
    const buildTask = function(taskContent,problemLink){
        if(taskContent !== ''){
            const task=document.createElement("div");
            task.className=" tr row";
            task.innerHTML=` <div class="col-1 d-flex align-items-center justify-content-center"><input class="m-0 form-check-input checkbox" type="checkbox" value="" id="flexCheckDefault">
                         </div>
                         <div class="col w-100"><label class="form-check-label primary" style="background-color: transparent" for="flexCheckDefault">
                         <a `+ (problemLink===undefined?'':`href="${problemLink}" style="color:white;text-decoration: none;border-bottom: 2px solid #BFA181;"`) +` >${taskContent}</a>
                            </label></div>
                        <div class="col-2 d-flex align-items-center justify-content-end">
                        <button type="button" class="btn-close" aria-label="Close">
                        </button></div>`;
            task.querySelector('button').addEventListener('click',event=>{
                tasksList.removeChild(task);
            });

            tasksList.appendChild(task);
            const taskInput=document.querySelector('#taskInput');
            if(taskInput) {
                // If it exists, clear its value
                document.querySelector('#taskInput').value = '';
            }
        }
    };

    buildTask("Solve 2 problems in Game Theory",);
    buildTask("Learn about BFS");
    buildTask("Problem Watermelon","oj");
    buildTask("Participate in DIV2 Codeforces");
</script>
</html>