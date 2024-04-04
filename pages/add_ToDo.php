<?php

require_once '../includes/userChecker.php';
require_once 'Badges.php';

$data = json_decode(file_get_contents("php://input"), true);

$status_table = new Status_Table();
$status_table->set_status($data['problem_id'], $user_id, 2);

echo 1;