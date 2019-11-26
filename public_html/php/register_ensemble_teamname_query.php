<?php
session_start();
require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: ../log_in.php');
}

$ensemble_team_name = filter_input(INPUT_POST, 'ensemble_team_name', FILTER_SANITIZE_STRING);
$sql_match = "SELECT * FROM ensemble_cat WHERE Ensemble_TeamName='$ensemble_team_name'";
$result_match = mysqli_query($link, $sql_match);

if (mysqli_num_rows($result_match) > 0) {
    echo true;
} else {
    echo false;
}

?>