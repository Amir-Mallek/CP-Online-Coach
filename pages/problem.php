<?php
if (!isset($_GET['problem_id'])) {
    header('location: levels.php');
    exit;
}

require_once '../includes/userChecker.php';
require_once '../auto_load.php';

$problem_id = $_GET['problem_id'];

$attempts_table = new Attempts_Table();
$problems_table = new Problems_Table();
$hints_table = new Hints_Table();
$attempts = $attempts_table->get_attempts($problem_id, $user_id);
$problem = $problems_table->get_problem($problem_id);
$nb_hints = $hints_table->get_nb_hints($problem_id);
$verdict_color = [
    'AC' => 'green',
    'WA' => 'red',
    'CE' => 'yellow',
    'RTE' => 'orange',
    'TLE' => 'blue',
    'MLE' => 'purple'];
$string_tags = $problem->tags;
$tags = explode(',', $string_tags);

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Problem Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/problem-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?= $nb_hints ?>
<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="display-1"><?= $problem->title ?></h1>
            <h4><a href="<?= $problem->link ?>" target="_blank"
                   class="link-light link-underline-opacity-25 link-underline-opacity-100-hover clink">
                    <?= $problem->platform." ".$problem->id_platform  ?>
                   <span class="material-symbols-outlined">link</span>
                </a>
            </h4>
            
            <h4 class="mt-2 ptags">
                Problem Tags:
                <?php foreach ($tags as $tag): ?>
                    <span class="tag rounded px-2 pb-1"><?= $tag ?></span>
                <?php endforeach; ?>
            </h4>
            
            <div class="timer-div mt-4 container">
                <div class="row align-items-center">
                    <div class="col-2 text-center">
                        <h1>Timer:</h1>
                    </div>
                    <div class="clock container text-center col-6">
                        <div class="row">
                            <div class="col">
                                <span class="hours">00</span>
                                <br>
                                <span class="label col-5">Hours</span>
                            </div>
                            <div class="col">:</div>
                            <div class="col">
                                <span class="minutes">00</span>
                                <br>
                                <span class="label col-2">Minutes</span>
                            </div>
                            <div class="col">:</div>
                            <div class="col">
                                <span class="seconds">00</span>
                                <br>
                                <span class="label col-5">Seconds</span>
                            </div>
                        </div>
                        <div class="commands">
                            <button class="btn start input me-3 px-4">Start</button>
                            <button class="btn stop input mx-3 px-4" disabled>Stop</button>
                            <button class="btn reset input ms-3 px-4" disabled>Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-5">
                <h2>Attempts:</h2>
                <table class="table attempts">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">When</th>
                            <th scope="col">Time Spent(min)</th>
                            <th scope="col">Hints</th>
                            <th scope="col">Language</th>
                            <th scope="col">Verdict</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($attempts as $attempt):
                            $time = $attempt->time_spent_min;
                            $time_spent = (isset($time)) ? $time : '-';
                            try {
                                $when = new DateTime($attempt->attempt_time);
                            } catch (Exception $e) {}
                            ?>
                            <tr>
                                <th scope="row"><?= $attempt->attempt_number ?></th>
                                <td><?= $when->format('Y/m/d, H:i'); ?></td>
                                <td><?= $time_spent ?></td>
                                <td><?= $attempt->nb_hints ?>/<?= $nb_hints ?></td>
                                <td><?= $attempt->language ?></td>
                                <td style="background-color: <?= $verdict_color[$attempt->verdict] ?>; font-weight: bold;">
                                    <?= $attempt->verdict ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="container add-attempt">
                    <div class="row text-center align-items-end mb-5">
                        <div class="col-3" style="color: white;">
                            <button class="btn add-attempt input">Add Attempt</button>
                        </div>
                        <div class="col-2">
                            <h6>Language</h6>
                            <select class="form-select lang form-control">
                                <option selected value="0">C++</option>
                                <option value="1">Java</option>
                                <option value="2">Python</option>
                                <option value="3">Ruby</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <h6>Verdict</h6>
                            <select class="form-select verdict form-control">
                                <option selected value="0">AC</option>
                                <option value="1">WA</option>
                                <option value="2">CE</option>
                                <option value="3">RTE</option>
                                <option value="4">TLE</option>
                                <option value="5">MLE</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <h6>Time Spent</h6>
                            <input type="number" class="time-spent form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="hints">
                <h2>Hints:</h2>
            </div>

        </div>
        <div class="col-2"></div>
    </div>
</div>
<script src="../assets/js/problem-script.js"></script>
</body>
</html>