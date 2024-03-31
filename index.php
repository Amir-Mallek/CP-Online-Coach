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
    <?php
    link_bootstrap_style();
    ?>
    <link href="assets/css/home-style.css" rel="stylesheet">

</head>
<body >

<!-- navbar -->
<?php require_navbar();
include "includes/user_stats.php";
?>

<div id="main-container">
<div  class="container mx-auto py-4">
    <div class="row gap-3 justify-content-center">
        <!-- left card -->
        <div class="col-lg-3 my-2 px-3 shadow-sm text-center custom-card" id="left-card">
            <div class="row py-4 ">
                <div class="col-md-5 mx-1 d-flex align-items-center justify-content-center">
                    <img alt="profile picture" class="img-fluid rounded p-1 shadow" style="max-height: 128px" src="assets/img/profiles/<?= (isset($user_data->image_name)?$user_data->image_name:'profile_picture.png')?>">
                </div>
                <div class="col-md-6 px-0 d-flex flex-column justify-content-center text-start ">
                    <p class="h-6 primary mb-2 mt-3 fw-bold "><?=$user_data->username?></p>
<!--                    <p class="h-6 primary mb-3 mt-2 fw-semibold"><small class="secondary fw-normal">Rank</small> 300502</p>-->
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
                <div class="col custom-card py-3 position-relative">
                    <p class="secondary mb-0" style="font-size: small">Badges</p>
                    <p id="badges-number" class="primary fs-5 mb-1 fw-bold"></p>
                    <div id="badges" class="overflow-x-auto flex-nowrap row px-1 mx-1 py-1 position-absolute mb-3 bottom-0 start-0 end-0">
                        <?php buildBadgesSection();?>
                    </div>
                </div>
            </div>
            <div class="custom-card p-3 mb-3">
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
                <div class="row row-cols-1 row-cols-md-2 mt-2 g-4 overflow-auto scroll-content" style="max-height: 500px">
                    <?php buildUpcomingContestsSection();?>
                </div>
            </div>
        </div>
    </div>

    <div class="row gap-3 mt-2 text-center justify-content-center" style="padding-right: 12px">
        <div id="verdicts" class="custom-card col-lg-5 p-3">
            <h5 class="primary">Verdicts</h5>
            <div class="row justify-content-center">
                <div class="chart-container h-75 w-75">
                    <?php buildVerdictsSection();?>
                </div>
            </div>
        </div>

        <div id="ranking" class="custom-card col-lg-6 p-3">
            <h5 class="primary mb-6">Ranking</h5>
            <div class="container text-center mt-5">
                <canvas id="rankingChart"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
    <!--    ADD NOTIFICATIONS OR AREA FOR UPCOMING CONTESTS-->
</body>

<?php link_bootstrap_script();?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script src="assets/js/home-script.js"></script>
<html>