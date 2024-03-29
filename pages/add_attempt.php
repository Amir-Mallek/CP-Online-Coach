<?php
$attempt = json_decode(file_get_contents("php://input"), true);

$attempt_table = new Attempts_Table();
$attempt_table->insert();
