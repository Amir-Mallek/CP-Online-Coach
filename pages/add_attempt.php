<?php
require_once '../auto_load.php';

$attempt_data = json_decode(file_get_contents("php://input"), true);
session_id($attempt_data['session_id']);
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode('-1');
    exit;
}
$user_id = $_SESSION['user_id'];

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


$attempts_table = new Attempts_Table();
$status_table = new Status_Table();
$attempts_table->insert($attempt);
$status_code = 1;
if ($attempt['verdict'] == 'AC') $status_code = 0;
$status_table->set_status($attempt['problem_id'], $attempt['user_id'], $status_code);


echo json_encode('1');