const startButton = document.querySelector('.start');
const stopButton = document.querySelector('.stop');
const resetButton = document.querySelector('.reset');
const addAttemptButton = document.querySelector('button.add-attempt')
const doLaterButton = document.querySelector('.do-later');

const timeSpentIn = document.querySelector('input.time-spent');
const verdictIn = document.querySelector('select.verdict');
const langIn = document.querySelector('select.lang');

const attempts = document.querySelector('.attempts>tbody');
const toastContainer = document.querySelector('.toast-container');

const seconds = document.querySelector('.seconds');
const minutes = document.querySelector('.minutes');
const hours = document.querySelector('.hours');

let sec = 0;
let min = 0;
let hour = 0;
let timer;

//wlh ya mr la aamlou chatgpt

function runTimer() {
    timer = setInterval(() => {
        sec++;
        if (sec == 60) {
            sec = 0;
            min++;
            if (min == 60) {
                min = 0;
                hour++;
            }
        }
        seconds.innerText = (sec>9) ? sec : '0' + sec;
        minutes.innerText = (min>9) ? min : '0' + min;
        hours.innerText = (hour>9) ? hour : '0' + hour;
    }, 10);
}

function updateStatus(...args) {
    [startButton.disabled,
    stopButton.disabled, 
    resetButton.disabled] = args;
}

startButton.addEventListener('click', () => {
    if (startButton.disabled) return;
    updateStatus(1, 0, 1);
    timeSpentIn.value = '';
    runTimer();
});

stopButton.addEventListener('click', () => {
    if (stopButton.disabled) return;
    updateStatus(0, 1, 0);
    const timeSpentMin = min + hour * 60; 
    timeSpentIn.value = (timeSpentMin > 0) ? timeSpentMin : '';
    clearInterval(timer);
});

function resetTimer() {
    timeSpentIn.value = '';
    sec = 0; min = 0; hour = 0;
    seconds.innerText = '00'; 
    minutes.innerText = '00';
    hours.innerText = '00';
}

resetButton.addEventListener('click', () => {
    if (resetButton.disabled) return;
    updateStatus(0, 1, 1);
    resetTimer();
})

// Hints

const hintContainer = document.querySelector('.hints');
const hintHeader = document.querySelector('.hints>h2');

const nbHints = (hintContainer) ? hintContainer.childElementCount-1 : -1;
let nbOpenHints = getNbOpenHints();

function getNbOpenHints() {
    if (nbHints == 0) return -1;
    let res = 0;
    for (let i = 1; i < hintContainer.childElementCount; i++) {
        if (hintContainer.children[i].classList.length == 2)
            res++;
    }
    return res;
}

function getHintCount() {
    if (nbHints > 0) return `${nbOpenHints}/${nbHints}`;
    return '-';
}

function updateHintHeader() {
    if (nbHints > 0) {
        hintHeader.innerText = `Hints (${getHintCount()}):`;
    } else {
        hintContainer.removeChild(hintHeader);
    }
}

function openHint(hint, description) {
    nbOpenHints++;
    hint.classList.remove('closed');
    hint.innerText = description;
    updateHintHeader();
}

function isClosedHint(candidate) {
    return candidate.classList.contains('closed');
}

async function requestHintDescription(hint_id) {
    const hint_lookup = {
        'session_id': getSessionID(),
        'hint_id': hint_id
    };
    const url = '../pages/open_hint.php';
    const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(hint_lookup)
    });
    return response.json();
}

function getHintID(element) {
   return parseInt(element.classList[2].slice(1));
}

hintContainer.addEventListener('click', async (event) => {
    const candidate = event.target;
    if (!isClosedHint(candidate)) return;
    const hintID = getHintID(candidate);
    const hintDescription = await  requestHintDescription(hintID);
    openHint(candidate, hintDescription);
});


//adding an attempt

const langs = ['C++', 'Java', 'Python', 'Ruby'];

const verdicts = [
    'AC', 
    'WA', 
    'CE', 
    'RTE', 
    'TLE', 
    'MLE'
];

const verdictColors = {
    'AC': 'green',
    'WA': 'red',
    'CE': 'yellow',
    'RTE': 'orange',
    'TLE': 'blue',
    'MLE': 'purple'
};

function padZero(value) {
    return (value < 10) ? '0' + value : value;
}

function getCurrentDateTime() {
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = padZero(currentDate.getMonth() + 1);
    const day = padZero(currentDate.getDate());
    const hours = padZero(currentDate.getHours());
    const minutes = padZero(currentDate.getMinutes());

    return `${year}/${month}/${day}, ${hours}:${minutes}`;
}

function getTimeSpent() {
    return (timeSpentIn.value == '') ? '-' : timeSpentIn.value;
}

function getTimeSpentDB() {
    return (timeSpentIn.value == '') ? -1 : timeSpentIn.value;
}

async function addAttemptToDB() {
    const attempt = {
        problem_id: getProblemID(),
        attempt_number: getAttemptCount(),
        attempt_time: getCurrentDateTime(),
        time_spent_min: getTimeSpentDB(),
        nb_hints: nbOpenHints,
        language: getAttemptLang(),
        verdict: verdicts[verdictIn.value]
    };
    const url = '../pages/add_attempt.php';
    const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(attempt)
    });
    return await response.json();
}

function getSessionID() {
    return document.querySelector('.session-id').innerText;
}

function getProblemID() {
    return document.querySelector('.problem-id').innerText;
}

function getAttemptCount() {
    return attempts.childElementCount+1;
}

function getAttemptLang() {
    return langs[langIn.value];
}

function getAttemptVerdict() {
    return verdicts[verdictIn.value];
}
function addAttempt() {
    const attempt = document.createElement('tr');
    const th = document.createElement('th');
    th.scope = 'row';
    attempt.appendChild(th);
    th.innerText = getAttemptCount();

    let td = document.createElement('td');
    td.innerText = getCurrentDateTime();
    attempt.appendChild(td);

    td = document.createElement('td');
    td.innerText = getTimeSpent();
    attempt.appendChild(td);

    td = document.createElement('td');
    td.innerText = getHintCount();
    attempt.appendChild(td);

    td = document.createElement('td');
    td.innerText = getAttemptLang();
    attempt.appendChild(td);

    td = document.createElement('td');
    td.innerText = getAttemptVerdict();
    attempt.appendChild(td);

    attempt.lastChild.style =
        `background-color: ${verdictColors[getAttemptVerdict()]};
        font-weight: bold;`;

    attempts.insertBefore(attempt, attempts.firstChild);
    timeSpentIn.value = '';
}

function showNewBadge(badge) {
    toastContainer.innerHTML += `<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="http://localhost:8000/assets/img/badges/${badge['img_name']}" class="rounded me-2" width="20%">
                        <strong class="me-auto">${badge['title']}</strong>
                        <small class="text-body-secondary">just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${badge['description']}
                    </div>
                </div>`
    const newToast = toastContainer.lastChild;
    const toast = new bootstrap.Toast(newToast);
    toast.show();
}
addAttemptButton.addEventListener('click', () => {
    addAttemptToDB().then(newBadges => {
        if (newBadges !== -1) {
            for (const badge of newBadges) {
                showNewBadge(badge);
            }
        }
    })
    addAttempt();
})

// do later
const problemTitle = document.querySelector('.col-8>h1.display-1').innerText;
const problemLink = window.location.href;

async function addToDo() {
    const data = {
        'problem_id': getProblemID()
    }
    const url = '../pages/add_ToDo.php';
    const response = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    });
    return await response.json();
}
doLaterButton.addEventListener('click', () =>{
    addTask(problemTitle,problemLink,false);
    //buildTask('p'+getProblemID(), problemTitle, problemLink, false);
    addToDo().then(r => {});
});
