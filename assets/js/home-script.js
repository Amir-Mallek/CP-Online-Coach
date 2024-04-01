const progressBars=document.querySelectorAll(".progress");
progressBars.forEach(progress=>{
    const value = progress.getAttribute('data-value');
    const left = progress.querySelector('.progress-left .progress-bar');
    const right = progress.querySelector('.progress-right .progress-bar');

    if (value > 0) {
        if (value <= 50) {
            right.style.transform = `rotate(${percentageToDegrees(value)}deg)`;
        } else {
            right.style.transform = 'rotate(180deg)';
            left.style.transform = `rotate(${percentageToDegrees(value - 50)}deg)`;
        }
    }
});
function percentageToDegrees(percentage) {
    return (percentage / 100) * 360;
}

tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

//To-Do List
const addButton=document.querySelector('#addButton');
const taskInput=document.querySelector('#taskInput');
addButton.addEventListener('click',()=>{
    if(taskInput.value)
        addTask(taskInput.value,undefined,  false );
});

const skillsChart = document.querySelector('#skillsChart');
const skillsData = {
    labels: skillsLabels,
    datasets:
        [{
            label: 'Skills',
            data: skillsDataset,
            fill: true,
            backgroundColor: 'rgba(23,133,130,0.2)',
            borderColor: '#178582',
            pointBackgroundColor: '#178582',
            pointBorderColor: '#BFA181',
            pointHoverBackgroundColor: '#BFA181',
            pointHoverBorderColor: '#178582'
        }]
};

new Chart(skillsChart, {
    type: 'radar',
    data: skillsData,
    options: {
        responsive: true,
        scales: {
            r: {
                angleLines: {
                    color: '#BFA181'
                },
                grid: {
                    color: '#BFA181'
                },
                pointLabels: {
                    color: '#BFA181'
                },
                ticks: {
                    color: 'white',//'#BFA181',
                    backdropColor: 'transparent',
                    precision:0,
                    z:1,
                    font:{
                        weight:'bold',
                        size:15
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                labels: {
                    color: '#BFA181'
                }
            }
        }


    }
});

const verdictsChart = document.querySelector('#verdictsChart');

if(verdictsDataset){
    const verdictsData = {
        labels: [
            'AC',
            'WA',
            'TLE',
            'MLE',
            'CE',
            'RTE'
        ],
        datasets: [{
            data: verdictsDataset,
            backgroundColor: [
                '#04BF8A',
                '#F24405',
                '#9FC131',
                '#FA7F08',
                '#22BABB',
                '#D6D58E'
            ],
            hoverOffset: 4
        }]
    };
    const displayLimit=verdictsDataset.reduce((total, value) => total + value, 0) * 0.09;

new Chart(verdictsChart, {
    type: 'doughnut',
    data: verdictsData,
    options: {
        responsive: true,
        plugins: {
            datalabels: {
                color: 'white',
                display: function(context) {
                    const index = context.dataIndex;
                    const value = context.dataset.data[index];
                    return value >displayLimit;
                }
            },
            legend: {
                position: 'left',
                display: true,
                labels: {
                    color: 'white',

                }
            },
        },
        layout: {
            padding: {
                right: 5,
                left:5
            }
        }
    },
    plugins: [ChartDataLabels],
});}


const rankingChart = document.querySelector('#rankingChart');
const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const problemsSolvedChart=document.querySelector('#problemsSolvedChart');
const rankingData = {
    labels: months, // Using the corrected labels array
    datasets: [{
        label: 'Rank',
        data: problemsDataset[2024],
        fill: true,
        borderColor: '#178582',
        // backgroundColor: 'rgba(23,133,130,0.2)',
        pointBackgroundColor: '#178582',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: '#178582',
        tension: 0.1
    }]
};
const problemsChart= new Chart(problemsSolvedChart, {
    type: 'line',
    data: rankingData,
    responsive: true,
    options: {
        plugins: {
            legend: {
                display: false // This hides the legend, adjust as needed
            }
        },
        scales: {
            x: {
                ticks: {
                    color: '#BFA181',
                    //borderColor: 'blue' // This sets the border color of the x-axis gridlines
                },
                grid: {
                    color: 'rgba(239,242,246,0.1)',
                }

            },
            y: {
                ticks: {
                    color: '#BFA181',
                    //borderColor: 'green' // This sets the border color of the y-axis gridlines
                },
                grid: {
                    color: 'rgba(239,242,246,0.1)',
                }
            }
        }
    }

});
const buildProblemsSolvedSection= function (year) {

    problemsChart.data.datasets[0].data= problemsDataset[year];// Would update the first dataset's value of 'March' to be 50
    problemsChart.update();

}
const dropdownItems=document.querySelectorAll('.dropdown-item');

dropdownItems.forEach((item) => {
    item.addEventListener('click', function() {
        buildProblemsSolvedSection(item.textContent); // Pass the text content of the dropdown item as the parameter
    });
});
