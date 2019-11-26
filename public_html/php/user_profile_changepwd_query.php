<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: ../log_in.php');
}

$input_pwd = filter_input(INPUT_POST, 'input_password', FILTER_SANITIZE_STRING);
$sql_match = "SELECT * FROM user WHERE User_ID ='$_SESSION[uID]'";
$result_match = mysqli_query($link, $sql_match);
$row_match = mysqli_fetch_assoc($result_match);
$pass_hashed = $row_match['User_Password'];
if (password_verify($input_pwd, $pass_hashed) && mysqli_num_rows($result_match) == 1) {
    echo true;
} else {
    echo false;
}

?>