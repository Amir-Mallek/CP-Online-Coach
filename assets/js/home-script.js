/**
 * function to initialize tooltips of boostrap
 */
function initTooltips() {
    tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
}

/**
 * add necessary logic to add new tasks to the list
 */
function handleToDoList() {
    const addButton = document.querySelector('#addButton');
    const taskInput = document.querySelector('#taskInput');
    addButton.addEventListener('click', () => {
        if (taskInput.value)
            addTask(taskInput.value, undefined, false);
    });
}

function initializeCharts() {
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
    function handleDropdown() {
        const dropdownItems = document.querySelectorAll('.dropdown-item');

        dropdownItems.forEach((item) => {
            item.addEventListener('click', function () {
                buildProblemsSolvedSection(item.textContent); // Pass the text content of the dropdown item as the parameter
            });
        });
    }
    handleDropdown();
}


/**
 * This function calculates the maximum height for the upcoming contests scrollable area.
 * It ensures that the left card and right card have the same height.
 * @returns {number} The calculated max-height.
 */
function fixUpcomingContestsHeight() {
    function getHeight(element) {
        return element.getBoundingClientRect().height;
    }

    function calculateMaxHeight() {
        const rightCardChildren = rightCard.children;
        const leftCardHeight = getHeight(leftCard);
        const height1 = getHeight(rightCardChildren[0]);
        const height2 = getHeight(rightCardChildren[1]);
        const height3 = getHeight(upcomingContests.children[0]);
        const extraMargin = 42.8; // px
        const extraPadding = 32; // px
        return leftCardHeight - height1 - height2 - extraMargin - extraPadding - height3;
    }

    const upcomingContests = document.querySelector('#upcoming-contests');
    const upcomingContestsContent = upcomingContests.querySelector('#upcoming-contests-content');
    const rightCard = document.querySelector('#right-card');
    const leftCard = document.querySelector('#left-card');
    upcomingContestsContent.style.maxHeight = calculateMaxHeight() + "px";
}

document.addEventListener('DOMContentLoaded', () => {
    initTooltips();
    handleToDoList();
    initializeCharts();
    fixUpcomingContestsHeight();
});