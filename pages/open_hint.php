<?php
require_once '../auto_load.php';

$open_hint_data = json_decode(file_get_contents("php://input"), true);

session_id($open_hint_data['session_id']);
session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode('-1');
    exit;
}
$user_id = $_SESSION['user_id'];
$hint_id = $open_hint_data['hint_id'];

$hints_table = new Hints_Table();
$open_hints_table = new Open_Hints_Table();
$hint_description = $hints_table->get_description($hint_id);
$open_hints_table->open_hint($hint_id, $user_id);

echo json_encode($hint_description);