const startButton = document.querySelector('.start');
const stopButton = document.querySelector('.stop');
const resetButton = document.querySelector('.reset');
const addAttemptButton = document.querySelector('button.add-attempt')

const timeSpentIn = document.querySelector('input.time-spent');
const verdictIn = document.querySelector('select.verdict');
const langIn = document.querySelector('select.lang');

const attempts = document.querySelector('.attempts>tbody');

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

let nbOpenHints = 0;
const nbHints = 2;
const hints = ["Don't forget long long xD!", "Think Greedy."];
const hintIsOpen = [false, false];

function getHintCount() {
    if (nbHints == 0) return '-';
    return `${nbOpenHints}/${nbHints}`;
}

function updateHintHeader() {
    if (nbHints > 0) {
        hintHeader.innerText = `Hints (${getHintCount()}):`;
    } else {
        hintContainer.removeChild(hintHeader);
    }
}

function openHint(id) {
    nbOpenHints++;
    const hint = hintContainer.children[id+1];
    hint.classList.remove('closed');
    hint.innerText = hints[id];
    updateHintHeader();
}

function createHint() {
    const hint = document.createElement('div');
    hint.classList.add('hint');
    hint.classList.add('closed');
    hint.innerText = 'View Hint';
    hintContainer.appendChild(hint);
}


for (let i = 0; i < nbHints; i++) {
    createHint(); 
    if (hintIsOpen[i]) openHint(i);   
}

updateHintHeader();

function isClosedHint(candidate) {
    return candidate.classList.contains('closed');
}

hintContainer.addEventListener('click', (event) => {
    const candidate = event.target;
    if (!isClosedHint(candidate)) return;
    const hintId = Array.from(hintContainer.children).indexOf(candidate) - 1;
    openHint(hintId);
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

/*const verdicts = [
    'Accepted', 
    'Wrong Answer', 
    'Compilation Error', 
    'Run Time Error', 
    'Time Limit Exceeded', 
    'Memory Limit Exceeded'];*/

const verdictColors = [
    'green',
    'red',
    'yellow',
    'orange',
    'blue',
    'purple'
];

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

function addAttempt(...args) {
    const attempt = document.createElement('tr');
    const th = document.createElement('th');
    th.scope = 'row';
    attempt.appendChild(th);
    th.innerText = args[0];
    for (let i = 1; i < 6; i++) {
        const td = document.createElement('td');
        td.innerText = args[i];
        attempt.appendChild(td);
    };
    attempt.lastChild.style = 
        `background-color: ${args[6]};
        font-weight: bold;`;
    
    attempts.insertBefore(attempt, attempts.firstChild);
    timeSpentIn.value = '';
}

function getTimeSpent() {
    return (timeSpentIn.value == '') ? '-' : timeSpentIn.value;
}

addAttemptButton.addEventListener('click', () => {
    const nb = attempts.children.length + 1;
    const when = getCurrentDateTime();
    const timeSpent = getTimeSpent();
    const hintCount = getHintCount();
    const lang = langs[langIn.value];
    const verdict = verdicts[verdictIn.value];
    const verdictColor = verdictColors[verdictIn.value];
    addAttempt(nb, when, timeSpent, hintCount, lang, verdict, verdictColor);
})