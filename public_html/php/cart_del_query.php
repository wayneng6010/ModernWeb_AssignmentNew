<?php

session_start();
require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: log_in.php');
}

$del_cat = filter_input(INPUT_POST, 'del_cat', FILTER_SANITIZE_STRING);
$del_id = filter_input(INPUT_POST, 'del_id', FILTER_SANITIZE_NUMBER_INT);

switch ($del_cat) {
    case "chromatic":
        $sql_del = "DELETE FROM chromatic_cat WHERE Solo_UserID = $_SESSION[uID] AND Solo_Status = 'Pending' AND Solo_ID = '$del_id'";
        break;
    case "ensemble":
        $sql_del = "DELETE FROM ensemble_cat WHERE Ensemble_UserID = $_SESSION[uID] AND Ensemble_Status = 'Pending' AND Ensemble_ID = '$del_id'";
        break;
    case "orchestra":
        $sql_del = "DELETE FROM orchestra_cat WHERE Orchestra_UserID = $_SESSION[uID] AND Orchestra_Status = 'Pending' AND Orchestra_ID = '$del_id'";
        break;
    case "seminar":
        $sql_del = "DELETE FROM seminar WHERE Sem_UserID = $_SESSION[uID] AND Sem_Status = 'Pending' AND Sem_ID = '$del_id'";
        break;
}

$result_del = mysqli_query($link, $sql_del);
if ($result_del) {
    echo true;
} else {
    echo false;
}
?>