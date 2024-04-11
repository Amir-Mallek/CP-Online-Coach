<?php

require_once '../includes/userChecker.php';
require_once 'Badges.php';


$attempt_data = json_decode(file_get_contents("php://input"), true);

$problems_table = new Problems_Table();
$problems_table->update_acceptance($attempt_data['problem_id'], $attempt_data['verdict']=='AC');

$attempt = [
    'attempt_number' => $attempt_data['attempt_number'],
    'verdict' => $attempt_data['verdict'],
    'language' => $attempt_data['language'],
    'time_spent_min' => $attempt_data['time_spent_min'],
    'attempt_time' => $attempt_data['attempt_time'],
    'nb_hints' => $attempt_data['nb_hints'],
    'problem_id' => $attempt_data['problem_id'],
    'user_id' => $user_id
];

$status_code = 1;
if ($attempt['verdict'] == 'AC') {
    $status_code = 0;
    $new_badges = update_badges_progress($attempt);
    if (!empty($new_badges))
        echo json_encode($new_badges);
    else
        echo json_encode(-1);
} else echo json_encode(-1);

$attempts_table = new Attempts_Table();
$status_table = new Status_Table();
$attempts_table->insert($attempt);

$status_table->set_status($attempt['problem_id'], $attempt['user_id'], $status_code);

