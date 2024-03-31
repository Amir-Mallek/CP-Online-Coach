const tasksList = document.querySelector('.table');

// Build a task for the To-Do List
const buildTask = function(id, taskContent, problemLink, checked) {
    if (taskContent !== '') {
        const task = document.createElement("div");
        task.className = "tr row";
        task.innerHTML = `
            <div class="col-1 d-flex align-items-center justify-content-center">
                <input class="m-0 form-check-input checkbox" type="checkbox" ${checked ? 'checked' : ''} value="" id="flexCheckDefault">
            </div>
            <div class="col w-100">
                <label class="form-check-label primary" style="background-color: transparent" for="flexCheckDefault">
                    <a ${problemLink === undefined ? '' : `href="${problemLink}" style="color:white;text-decoration: none;border-bottom: 2px solid #BFA181;"`}>${taskContent}</a>
                </label>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-end">
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
        `;
        const checkbox = task.querySelector('.checkbox');

        checkbox.addEventListener('change', event => {
            tasks.get(id).checked = checkbox.checked;
            saveTodoListToCookies(); // Save updated list to cookies after checkbox change
        });


        task.querySelector('button').addEventListener('click', event => {
            tasksList.removeChild(task);
            tasks.delete(id);
            saveTodoListToCookies(); // Save updated list to cookies after deletion
        });

        tasksList.appendChild(task);
        const taskInput = document.querySelector('#taskInput');
        if (taskInput) {
            // If it exists, clear its value
            taskInput.value = '';
        }
    }
};

// Load tasks from cookies
function loadTodoListFromCookies() {

    const cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)todoList\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    if (cookieValue) {
        const decodedCookieValue = decodeURIComponent(cookieValue);
        const oldTasks=new Map(JSON.parse(decodedCookieValue)); // Initialize tasks as a Map
        const updatedTasks = new Map();

        oldTasks.forEach((value, key) => {
            updatedTasks.set(nextId++, value);
        });
        if(todolistBadge)
            todolistBadge.textContent=updatedTasks.size;
        return updatedTasks;

    } else {
        return new Map(); // Initialize tasks as an empty Map
    }
}

// Save tasks to cookies
function saveTodoListToCookies() {
    if(todolistBadge)
        todolistBadge.textContent=tasks.size;
    console.log(tasks);
    const todoListJSON = JSON.stringify([...tasks]); // Convert Map to array of key-value pairs
    document.cookie = 'todoList=' + encodeURIComponent(todoListJSON);
}

// Add a task to the list
const addTask = (taskContent, problemLink, checked) => {
    tasks.set(nextId, { taskContent, problemLink, checked }); // Set the task with a new ID
    buildTask(nextId, taskContent, problemLink, checked);
    saveTodoListToCookies(); // Save updated list to cookies after addition
    nextId++; // Increment nextId after adding task
};

// Load tasks from cookies and build them
let nextId =0; // Set nextId to the size of the current tasks
const todolistBadge=document.querySelector('#todolist-badge');

let tasks = loadTodoListFromCookies();

tasks.forEach((value, key) => {
    buildTask(key, value.taskContent, value.problemLink, value.checked);
});

// Example usage:
// addTask("Solve 2 problems in Game Theory", undefined, false);
// addTask("Learn about BFS", undefined, false);
// addTask("Problem Watermelon", "oj", false);
// addTask("Participate in DIV2 Codeforces", undefined, false);
