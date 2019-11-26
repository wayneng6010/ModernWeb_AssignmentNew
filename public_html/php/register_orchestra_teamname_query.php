<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: ../log_in.php');
}

$orchestra_team_name = filter_input(INPUT_POST, 'orchestra_team_name', FILTER_SANITIZE_STRING);
$sql_match = "SELECT * FROM orchestra_cat WHERE Orchestra_Name='$orchestra_team_name'";
$result_match = mysqli_query($link, $sql_match);

if (mysqli_num_rows($result_match) > 0) {
    echo true;
} else {
    echo false;
}

?>