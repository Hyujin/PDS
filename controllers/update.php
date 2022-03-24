<?php
session_start();

include_once ('db_conn.php');

$emp_id = $_SESSION['emp_id'];
$new_pass = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if($new_pass = $pass2){

$update_stmt = $db->prepare("UPDATE users SET password = '$new_pass' WHERE emp_id = $emp_id");
$clear_init_stmt = $db->prepare("UPDATE users SET init_pass = '' WHERE emp_id = $emp_id");
$update_stmt->execute();
$clear_init_stmt->execute();

unset($_SESSION['firstchangepass']);
header('location: ../index.php');
}
else{
    echo 'Incorrect admin username and/or password!';
                    $_SESSION['errorMessage'] = "Passwords do not match!";
                    header('location: ../auth/login.php?err=Passwords do not match!');
}
?>