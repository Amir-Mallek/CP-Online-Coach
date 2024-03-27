

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

//badges
const multipleCardCarousel = document.querySelector("#carouselExampleControls");
const carouselControlNext = document.querySelector("#carouselExampleControls .carousel-control-next");
const carouselControlPrev = document.querySelector("#carouselExampleControls .carousel-control-prev");
const toggleVisibility=function(turnon){
    if(turnon){
        carouselControlPrev.classList.remove('visually-hidden');
        carouselControlNext.classList.remove('visually-hidden');
    }else{
        carouselControlPrev.classList.add('visually-hidden');
        carouselControlNext.classList.add('visually-hidden');
    }
}
multipleCardCarousel.addEventListener('mouseenter',()=>{
    toggleVisibility(true);
});
multipleCardCarousel.addEventListener('mouseleave',()=>{
    toggleVisibility(false);
});

if (window.matchMedia("(min-width: 426px)").matches) {
    const carousel = new bootstrap.Carousel(multipleCardCarousel, {
        interval: false,
    });

    const carouselInner = document.querySelector("#carouselExampleControls .carousel-inner");


    const carouselWidth = carouselInner.scrollWidth;
    const cardWidth = document.querySelector("#carouselExampleControls .carousel-item").offsetWidth;
    let nbBadges = 3;
    if(window.matchMedia("min-width: 1440px)").matches)
        nbBadges=5;
    else if(window.matchMedia("min-width: 1024px)").matches)
        nbBadges=4;

    let scrollPosition = 0;

    carouselControlNext.addEventListener("click", function () {
        if (scrollPosition < carouselWidth - cardWidth * nbBadges) {
            scrollPosition += cardWidth;
            $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 400);

        }
    });

    carouselControlPrev.addEventListener("click", function () {
        if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $(".carousel-inner").animate({ scrollLeft: scrollPosition }, 400);

        }
    });
} else {
    multipleCardCarousel.classList.add("slide");
}



//To-Do List
const addButton=document.querySelector('#addButton');
const taskInput=document.querySelector('#taskInput');
addButton.addEventListener('click',()=>{
    buildTask(taskInput.value);
});

const skillsChart = document.querySelector('#skillsChart');
const skillsData = {
    labels: [
        'Number Theory',
        'Data Structure',
        'Graph Theory',
        'Strings',
        'Combinatorics',
        'Game Theory'
    ],
    datasets: //[{
        // label: 'Skills',
        // data: [33,25,15,9,11,40],
        // fill: true,
        // backgroundColor: 'rgba(255, 99, 132, 0.2)',
        // borderColor: 'rgb(255, 99, 132)',
        // color:'rgb(255,255,255)',
        // pointBackgroundColor: 'rgb(255, 99, 132)',
        // pointBorderColor: '#fff',
        // pointHoverBackgroundColor: '#fff',
        // pointHoverBorderColor: 'rgb(255, 99, 132)'}]
    //},
    [{
        label: 'Skills',
        data: [15, 20, 10, 25, 5, 25],
        fill: true,
        backgroundColor: 'rgba(23,133,130,0.2)',
        borderColor: '#178582',
        pointBackgroundColor: '#178582',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
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
                    color: 'white',
                    backdropColor: 'transparent'
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
const verdictsDataset=[214, 150, 9,1,6,8];
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
            '#22BABB',
            '#D6D58E',
            '#9FC131',
            '#FA7F08',
            '#04BF8A',
            '#F24405'
        ],
        hoverOffset: 4
    }]
};
const displayLimit=verdictsDataset.reduce((total, value) => total + value, 0) * 0.1;
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
});

const rankingChart = document.querySelector('#rankingChart');
const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const rankingData = {
    labels: months, // Using the corrected labels array
    datasets: [{
        label: 'Rank',
        data: [5210,4990,3500,3700,2900,2660,2100,2215,2090,2050,1948,1960],
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

new Chart(rankingChart, {
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
                    color:'#BFA181',
                    //borderColor: 'blue' // This sets the border color of the x-axis gridlines
                },
                grid: {
                    color:'rgba(239,242,246,0.1)',
                }

            },
            y: {
                ticks: {
                    color:'#BFA181',
                    //borderColor: 'green' // This sets the border color of the y-axis gridlines
                },
                grid: {
                    color:'rgba(239,242,246,0.1)',
                }
            }
        }
    }

});

