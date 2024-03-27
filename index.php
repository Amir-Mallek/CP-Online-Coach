<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="assets/css/home-style.css" rel="stylesheet">

</head>
<body>
<!-- navbar -->
<?php include_once 'pages/navbar.php'; ?>

<div class="container mx-auto p-4">
    <div class="row gap-3 justify-content-center">
        <!-- left card -->
        <div class="col-lg-3 my-2 px-3 shadow-sm text-center custom-card" id="left-card">
            <div class="row py-4 ">
                <div class="col-md-5 mx-1 d-flex align-items-center justify-content-center">
                    <img alt="profile picture" class="img-fluid rounded p-1" src="images/profile_picture.png">
                </div>
                <div class="col-md-6 px-0 d-flex flex-column justify-content-center text-start ">
                    <p class="h-6 primary mb-2 mt-3 fw-bold">Cyber Phantom</p>
                    <p class="h-6 primary mb-3 mt-2 fw-semibold"><small class="secondary fw-normal">Rank</small> 300502</p>
                </div>
            </div>
            <div class="row">
            <a class="icon-link secondary text-decoration-none" href="https://codeforces.com/profile/CMiner">
                <svg aria-hidden="true" class="bi" height="24" viewBox="0 0 24 24" width="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M4.5 7.5A1.5 1.5 0 0 1 6 9v10.5A1.5 1.5 0 0 1 4.5 21h-3C.673 21 0 20.328 0 19.5V9c0-.828.673-1.5 1.5-1.5h3zm9-4.5A1.5 1.5 0 0 1 15 4.5v15a1.5 1.5 0 0 1-1.5 1.5h-3c-.827 0-1.5-.672-1.5-1.5v-15c0-.828.673-1.5 1.5-1.5h3zm9 7.5A1.5 1.5 0 0 1 24 12v7.5a1.5 1.5 0 0 1-1.5 1.5h-3a1.5 1.5 0 0 1-1.5-1.5V12a1.5 1.5 0 0 1 1.5-1.5h3z"/>
                    </g>
                </svg>
                CMiner
            </a>
            <a class="icon-link secondary text-decoration-none"
               href="https://www.linkedin.com/in/mouhib-bahri-2b2a182b6/">
                <svg aria-hidden="true" class="bi" height="24" viewBox="0 0 72 72" width="24">
                    <!-- Specify the width and height of your icon -->
                    <g>
                        <path d="M8,72 L64,72 C68.418278,72 72,68.418278 72,64 L72,8 C72,3.581722 68.418278,-8.11624501e-16 64,0 L8,0 C3.581722,8.11624501e-16 -5.41083001e-16,3.581722 0,8 L0,64 C5.41083001e-16,68.418278 3.581722,72 8,72 Z"/>
                        <path d="M62,62 L51.315625,62 L51.315625,43.8021149 C51.315625,38.8127542 49.4197917,36.0245323 45.4707031,36.0245323 C41.1746094,36.0245323 38.9300781,38.9261103 38.9300781,43.8021149 L38.9300781,62 L28.6333333,62 L28.6333333,27.3333333 L38.9300781,27.3333333 L38.9300781,32.0029283 C38.9300781,32.0029283 42.0260417,26.2742151 49.3825521,26.2742151 C56.7356771,26.2742151 62,30.7656705 62,40.051212 L62,62 Z M16.349349,22.7940133 C12.8420573,22.7940133 10,19.9296567 10,16.3970067 C10,12.8643566 12.8420573,10 16.349349,10 C19.8566406,10 22.6970052,12.8643566 22.6970052,16.3970067 C22.6970052,19.9296567 19.8566406,22.7940133 16.349349,22.7940133 Z M11.0325521,62 L21.769401,62 L21.769401,27.3333333 L11.0325521,27.3333333 L11.0325521,62 Z"
                              fill="#262E33"/>
                    </g>
                </svg>
                Mouhib Bahri
            </a>
            </div>
            <hr/>
            <!-- languages section -->
            <div id="languages">
                <p class="h-6 primary mb-3 text-start">Languages</p>
                <div class="row">
                    <p class="rounded-pill mx-2 primary p-0"
                       style="background-color:#eff2f699;width: 48px">C++</p>
                    <p class="primary col text-end ">8<small class="secondary"> problems solved</small></p>
                </div>
                <div class="row">
                    <p class="rounded-pill mx-2 primary p-0"
                       style="background-color:#eff2f699;width: 48px">Java</p>
                    <p class="primary col text-end ">2<small class="secondary"> problems solved</small></p>
                </div>
            </div>
            <hr/>
            <!-- skills section -->
            <div id="skills">
                <p class="h-6 primary mb-3 text-start">Skills</p>
                <div class="gap-3 vstack">
                    <div>
                        <div class="row">
                            <div class="col secondary text-start">
                                Game Theory
                            </div>
                            <div class="col secondary text-end">
                                <small class="primary">6 </small>/60
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar " role="progressbar" style="width: 10%; height: 8px; background-color: #9FC131 " aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col secondary text-start">
                                Combinatorics
                            </div>
                            <div class="col secondary text-end">
                                <small class="primary">3 </small>/113
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar " role="progressbar" style="width: 4%; height: 8px;background-color: #F24405" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col secondary text-start">
                                Strings
                            </div>
                            <div class="col secondary text-end">
                                <small class="primary">2 </small>/89
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar" role="progressbar" style="width: 7%; height: 8px;background-color: #22BABB" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col secondary text-start">
                                Graph Theory
                            </div>
                            <div class="col secondary text-end">
                                <small class="primary">15 </small>/250
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar" role="progressbar" style="width: 4%; height: 8px;background-color: #FA7F08" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col secondary text-start">
                                Data Structure
                            </div>
                            <div class="col secondary text-end">
                                <small class="primary">9 </small>/143
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar" role="progressbar" style="width: 6%; height: 8px;background-color: #04BF8A" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col secondary text-start">
                                Number Theory
                            </div>
                            <div class="col secondary text-end">
                                <small class="primary">40 </small>/120
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress" style="height: 8px">
                                    <div class="progress-bar" role="progressbar" style="width: 30%; height: 8px;background-color: #D6D58E" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div>
            <div>
                <canvas  id="skillsChart"></canvas>
            </div>
            <hr/>
        </div>

        <!-- right cards -->
        <div class="col-lg-8 my-2 " id="right-card">
            <div class="row gap-3 mx-auto mb-3">
                <!-- solved problems card -->
                <div class="col custom-card">
                    <div class="row py-3">
                        <div class="col-md-4 circular">
                           <p class="secondary text-start" style="font-size: small">Solved Problems</p>
                           <div class="progress " data-value='24'>
                           <span class="progress-left">
                           <span class="progress-bar"></span>
                           </span>
                                <span class="progress-right">
                           <span class="progress-bar"></span>
                           </span>
                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                    <div class="h5 primary fw-semibold">
                                        24<!--<sup class="small">%</sup>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 gap-1 m-auto vstack">
                            <div class="container">
                                <div class="row">
                                    <div class="col secondary text-start">
                                        Easy
                                    </div>
                                    <div class="col secondary text-end">
                                        <small class="primary">5 </small>/728
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="progress" style="height: 8px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 3%; height: 8px" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col secondary text-start">
                                        Medium
                                    </div>
                                    <div class="col secondary text-end">
                                        <small class="primary">14 </small>/519
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="progress" style="height: 8px">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 12%; height: 8px" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col secondary text-start">
                                        Hard
                                    </div>
                                    <div class="col secondary text-end">
                                        <small class="primary">2 </small>/340
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="progress" style="height: 8px">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 1%; height: 8px" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- badges card -->
                <div class="col custom-card">
                    <div class="py-2  text-start">
                        <p class="secondary mb-0" style="font-size: small">Badges</p>
                        <p class="primary fs-5 mb-1 fw-bold " >3</p>
                        <div id="badges" class=" row px-1" >
                            <div id="carouselExampleControls" class="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active text-center align-self-center" >
                                        <img src="images/badges/lightinghawk.png" class="h-75 w-75" alt="first solve" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lighting Hawk: First Solve" >

                                    </div>
                                    <div class="carousel-item text-center align-self-center">
                                        <img src="images/badges/solveunder5.png" class="h-75 w-75" alt="solve under 5mins" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Speed: Solve Under 5 mins">
                                    </div>
                                    <div class="carousel-item text-center align-self-center">
                                        <img src="images/badges/nightowl.png" class="h-75 w-75 " alt="solve 5 problems between midnight and 5am" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Night Owl: Solve 5 Problems Between Midnight and 5 am">
                                    </div>
                                    <div class="carousel-item text-center align-self-center">
                                        <img src="images/badges/triathonphoenix.png" class="h-75 w-75 opacity-50" alt="Participate in 3 contests within a week" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Triathlon Phoenix: Participate in 3 Contests Within a Week">
                                    </div>
                                    <div class="carousel-item text-center align-self-center">
                                        <img src="images/badges/lonewolf.png" class="h-75 opacity-50 w-75" alt="rank among top 10" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lone Wolf: Rank Among Top 10">
                                    </div>

                                </div>
                                <button class="carousel-control-prev visually-hidden" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon m-2" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next visually-hidden" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon m-2" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- to-do list card -->
            <div class="custom-card p-3 mb-3">
                <h5 class="primary mb-6">To-Do List</h5>
                <div class="rounded-2 mb-4 mt-1 d-flex align-items-center justify-content-between ps-2 mb-2" style="background-color: #eff2f699;height: 50px; border: 2px solid #BFA181 ;">
                    <input id="taskInput" type="text" class=" p-1 form-control border-0 h-100" style="background-color:transparent;box-shadow: none;color: white;" placeholder="Add your task">
                    <button id="addButton" class="primary btn border-0 rounded-2 h-100" style="width:20%;background-color: #178582">Add</button>
                </div>
                <?php include_once "pages/todolist.php";?>
            </div>

            <!-- upcoming contests -->
            <div id="upcoming-contests" class="custom-card p-3">
                <h5 class="primary mb-6">Upcoming Contests</h5>
                <div class="row row-cols-1 row-cols-md-2 mt-2 g-4">
                    <div class="col">
                        <a href="your_link_here" class="text-decoration-none">
                        <div class="card">
                            <div class="h-100 d-flex align-items-start">
                                <img src="images/codeblinders_cover.jpg" class="card-img-top" alt="Code Blinders">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Code Blinders</h5>
                                <p class="card-text">Saturday 24 February, ESPRIT</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="your_link_here" class="text-decoration-none">
                        <div class="card">
                            <div class="h-100 d-flex align-items-start">
                                <img src="images/eptsolvingcup_cover.jpg" class="card-img-top" alt="EPT Solving Cup">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">EPT Solving Cup</h5>
                                <p class="card-text">Sunday 25 February, EPT</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="your_link_here" class="text-decoration-none">
                        <div class="card">
                            <div class="h-100 d-flex align-items-start">
                                <img src="images/wintercup_cover.png" class="card-img-top" alt="Winter Cup">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Winter Cup</h5>
                                <p class="card-text">Sunday 3 Mars, INSAT</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="your_link_here" class="text-decoration-none">
                        <div class="card">
                            <div class="h-100 d-flex align-items-start">
                                <img src="images/codeforces_cover.png" class="card-img-top" alt="Div 2">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Div 2</h5>
                                <p class="card-text">Tuesday 5 Mars, CODEFORCES</p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gap-3 mt-2 text-center justify-content-center" style="padding-right: 12px">
        <div id="verdicts" class="custom-card col-5 p-3">
            <h5 class="primary">Verdicts</h5>
            <div class="row justify-content-center">
                <div class="chart-container h-75 w-75">
                    <canvas id="verdictsChart"></canvas>
                </div>
            </div>
        </div>

        <div id="ranking" class="custom-card col-6 p-3">
            <h5 class="primary mb-6">Ranking</h5>
            <div class="container text-center mt-5">
                <canvas id="rankingChart"></canvas>
            </div>
        </div>
    </div>
</div>
    <!--    ADD NOTIFICATIONS OR AREA FOR UPCOMING CONTESTS-->
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script src="assets/js/home-script.js"></script>

</html>