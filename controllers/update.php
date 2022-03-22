<?php
include_once ('db_conn.php');

$emp_id = $_SESSION['emp_id'];
$new_pass = $_POST['pass1'];

$update_stmt = $db->prepare('UPDATE users SET password = $new_pass WHERE emp_id = $emp_id');

$clear_init_stmt = $db->prepare('UPDATE users SET init_pass = NULL WHERE emp_id = $emp_id');

?>