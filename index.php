<?php
require_once 'includes/userChecker.php';
require_once 'auto_load.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <?php link_bootstrap_style(); ?>
    <link href="assets/css/home-style.css" rel="stylesheet">
    <link href="assets/css/circular-progress-bar.css" rel="stylesheet">
</head>
<body>
<?php require_navbar(); ?>
<?php include "includes/user_stats.php"; ?>
<div id="main-container" style="padding: 1.5em 4em 1.5em 4em">
    <div class="row container justify-content-center py-2 px-1 mx-auto " >
        <!-- left card -->
        <div class="col-lg-3 py-0 px-3 h-100 shadow-sm text-center custom-card" id="left-card">
            <div class="row py-4 ">
                <div class="col-md-5 d-flex align-items-center justify-content-center">
                    <img alt="profile picture" class="img-fluid rounded p-1 shadow" style="max-height: 128px" src="assets/img/profiles/<?= (isset($user_data->image_name)?$user_data->image_name:'profile_picture.png')?>">
                </div>
                <div class="col-md-6 px-2 d-flex flex-column justify-content-center text-start ">
                    <p class="h-6 primary mb-2 mt-3 fw-bold "><?=$user_data->username?></p>
                </div>
            </div>
            <div class="row gap-1">
                <?php buildUserSection();?>
            </div>
            <hr/>
            <!-- languages section -->
            <div id="languages">
                <p class="h-6 primary mb-3 text-start">Languages</p>
                <?php
                buildLanguagesSection();
                ?>
            </div>
            <hr/>
            <!-- skills section -->
            <div id="skills">
                <p class="h-6 primary mb-3 text-start">Skills</p>
                <div class="gap-3 vstack mb-2">
                    <?php
                    buildSkillsSection();
                    ?>
                </div>
                <hr/>
            </div>
            <div  class="d-flex justify-content-center">
                <canvas style="max-width:350px; max-height: 350px" id="skillsChart"></canvas>
            </div>
            <hr/>
        </div>
        <!-- right cards -->
        <div class="col-lg-9 pe-0 " style="padding-left: 1.5rem" id="right-card">
            <div class="row mx-auto">
                <!-- solved problems card -->
                <div class="col-sm custom-card">
                    <div class="row">
                        <div class="col-md-4 circular">
                            <p class="secondary text-start" style="font-size: small">Solved Problems</p>
                            <div class="progress " data-value='<?=number_format(countSolvedProblems(),2)?>'>
                           <span class="progress-left">
                           <span class="progress-bar"></span>
                           </span>
                                <span class="progress-right">
                           <span class="progress-bar"></span>
                           </span>
                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                    <div class="h6 primary fw-semibold">
                                        <?=countSolvedProblems();?><sup class="small">%</sup>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 gap-1 m-auto vstack">
                            <?php buildSolvedProblemsSection();?>
                        </div>
                    </div>
                </div>
                <!-- badges card -->
                <div id="badgesCard" class="col-sm ms-3 custom-card py-3 position-relative">
                    <p class="secondary mb-0" style="font-size: small">Badges</p>
                    <p id="badges-number" class="primary fs-5 mb-2 fw-bold"></p>
                    <div id="badges" class="overflow-x-auto flex-nowrap row px-1 mx-1 py-1 row mb-1">
                        <?php buildBadgesSection();?>
                    </div>
                </div>
            </div>
            <div class="custom-card p-3">
                <h5 class="primary mb-6">To-Do List</h5>
                <div class="rounded-2 mb-4 mt-1 d-flex align-items-center justify-content-between ps-2 mb-2" style="background-color: #eff2f699;height: 50px; border: 2px solid #BFA181 ;">
                    <input id="taskInput" type="text" class=" p-1 form-control border-0 h-100" style="background-color:transparent;box-shadow: none;color: white;" placeholder="Add your task">
                    <button id="addButton" class="primary btn border-0 rounded-2 h-100" style="width:20%;background-color: #178582">Add</button>
                </div>
                <?php include_once "includes/todolist.php";?>
            </div>
            <!-- upcoming contests -->
            <div id="upcoming-contests" class="custom-card p-3">
                <h5 class="primary mb-6">Upcoming Contests</h5>
                <div class="row row-cols-1 row-cols-md-2 mt-2 g-4 overflow-auto scroll-content" id="upcoming-contests-content">
                    <?php buildUpcomingContestsSection();?>
                </div>
            </div>
        </div>
    </div>
    <div class="row container mx-auto py-0 px-1 text-center" >
        <div class="col-lg px-0">
            <div id="verdicts" class="custom-card mb-0">
                <h5 class="primary">Verdicts</h5>
                <div class="row">
                    <?php buildVerdictsSection();?>
                </div>
            </div>
        </div>
        <div id="rankingContainer" class="col-lg pe-0" style="padding-left: 1.5rem">
            <div id="ranking" class="custom-card h-100">
                <div class="row justify-content-between align-items-center">
                    <h5 class="col primary mb-0">Problems Solved</h5>
                    <div class="col dropdown text-end">
                        <button class="px-2 py-1 rounded dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true">Year</button>
                        <div class="dropdown-menu custom-card" data-popper-placement="bottom-end">
                            <a class="dropdown-item primary">2022</a>
                            <a class="dropdown-item primary">2023</a>
                            <a class="dropdown-item primary" >2024</a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center h-100">
                    <canvas id="problemsSolvedChart" ></canvas>
                </div>
            </div>
        </div>
</div>

<!-- JavaScript -->
<?php link_bootstrap_script(); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="assets/js/circular-progress-bar.js"></script>
<script src="assets/js/home-script.js"></script>
</body>
</html>


