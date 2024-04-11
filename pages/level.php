<?php
$level_id = $_GET['level_id'];

require_once '../includes/userChecker.php';
require_once '../auto_load.php';

$status_table = new Status_Table();
$problems_table = new Problems_Table();
$resources_table = new Resources_Table();
$levels_table = new Levels_Table();
$problems = $problems_table->get_problems($level_id);
$status_data = $status_table->get_problems_status($level_id, $user_id);
$resources = $resources_table->get_resources($level_id);
$level = $levels_table->get_level($level_id);

$nb_problems = $level->nb_problems;
$nb_solved_problems = 0;
$emoji = ['✅', '❌', '📆', '➖'];
$front_status = [];
foreach ($status_data as $stat) {
    if ($stat->code == 0) $nb_solved_problems++;
    $front_status[$stat->problem_id] = $emoji[$stat->code];
}
foreach ($problems as $problem) {
    if (!array_key_exists($problem->id, $front_status)) {
        $front_status[$problem->id] = $emoji[3];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level Page</title>
    <?php link_bootstrap_style(); ?>
    <link href="../assets/css/level-style.css" rel="stylesheet">
    <style>
        .progress-bar {
            width: <?= (($nb_solved_problems/$nb_problems) * 100).'%' ?>;
        }
    </style>
</head>
<body>
<?php
require_navbar();
link_bootstrap_script();
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="display-1">Level <?= $level->level_id ?></h1>
            <h4>Solved <?= $nb_solved_problems ?> out of <?= $nb_problems ?></h4>
            <div class="progress" role="progressbar">
                <div class="progress-bar"></div>
            </div>
            <div class="container mt-4 align-items-center">
                <div class="row">
                    <div class="col-6">
                        <p class="mt-3 summary"><?= $level->summary ?></p>
                    </div>
                    <div class="col-6">
                        <h4>Resources:</h4>
                        <?php foreach ($resources as $resource): ?>
                            <div>
                                <h6><?= $resource->topic.': ' ?>
                                    <a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover ml-2"
                                       href="<?= $resource->link ?>" target="_blank"><?= $resource->platform ?></a>
                                </h6>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


            <table class="table mt-5 text-center">
                <thead>
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Title</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Acceptance</th>
                    <th scope="col">Difficulty</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($problems as $problem): ?>
                    <tr>
                        <th scope="row" id=""><?= $front_status[$problem->id] ?></th>
                        <td>
                            <a href="problem.php?problem_id=<?=$problem->id ?>"><?= $problem->title ?></a>
                        </td>
                        <td><?= $problem->platform ?></td>
                        <td><?= $problems_table->get_acceptance($problem->id) ?>%</td>
                        <td><?= $problem->difficulty ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>
</body>
</html>