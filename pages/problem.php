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
$open_hints_table = new Open_Hints_Table();

$attempts = $attempts_table->get_attempts($problem_id, $user_id);
$problem = $problems_table->get_problem($problem_id);
$hints = $hints_table->get_hints($problem_id);
$nb_hints = count($hints);
$open_hints = $open_hints_table->get_open_hints($problem_id, $user_id);
$nb_open_hints = count($open_hints);

$open_ids = [];
foreach ($open_hints as $open_hint)
    $open_ids[] = $open_hint->hint_id;

$verdict_color = [
    'AC' => 'green',
    'WA' => 'red',
    'CE' => 'yellow',
    'RTE' => 'orange',
    'TLE' => 'blue',
    'MLE' => 'purple'];
$string_tags = $problem->tags;
$tags = explode(',', $string_tags);
$attempts = array_reverse($attempts);

function is_open($hint) {
    global $open_ids;
    return in_array($hint->id, $open_ids);
}

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Problem Page</title>
    <?php link_bootstrap_style(); ?>
    <link href="../assets/css/problem-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />

</head>
<body class="">
<?php
require_navbar();
link_bootstrap_script();
?>

<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="display-1"><?= $problem->title ?></h1>
            <div class="container">
                <div class="row align-items-center justify-content-start">
                    <div class="col-5">
                        <h4><a href="<?= $problem->link ?>" target="_blank"
                               class="link-light link-underline-opacity-25 link-underline-opacity-100-hover clink">
                                <?= $problem->platform." ".$problem->id_platform  ?>
                                <span class="material-symbols-outlined">link</span>
                            </a>
                        </h4>

                        <h4 class="mt-2 ptags">
                            Problem Tags:
                            <?php foreach ($tags as $tag): ?>
                                <span class="tag rounded px-2 pb-1" style="display: inline-block;"><?= $tag ?></span>
                            <?php endforeach; ?>
                        </h4>
                    </div>
                    <div class="col">
                        <button class="btn input do-later" style="width: 25%; display: ;">Do Later 📆</button>
                    </div>
                </div>
            </div>

            
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
                            $time_spent = ($time != -1) ? $time : '-';
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
            <?php if ($nb_hints > 0):?>
                <div class="hints">
                    <h2>Hints (<?= $nb_open_hints ?>/<?= $nb_hints ?>):</h2>
                    <?php foreach ($hints as $hint): ?>
                        <div class="hint <?= (is_open($hint) ? '' : 'closed').' h'.$hint->id ?>">
                            <?= is_open($hint) ? $hint->description : 'View Hint' ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>

        <div class="toast-container position-fixed bottom-0 st-0 mb-5"></div>
    </div>
</div>
<script src="../assets/js/problem-script.js"></script>
<p class="session-id" style="display: none;"><?= session_id() ?></p>
<p class="problem-id" style="display: none;"><?= $problem_id ?></p>
</body>
</html>