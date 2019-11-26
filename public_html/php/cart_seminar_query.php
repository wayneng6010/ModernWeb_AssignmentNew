<?php

session_start();
require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: log_in.php');
}
$seminar_session = filter_input(INPUT_POST, 'session', FILTER_SANITIZE_STRING);
$seminar_quantity = filter_input(INPUT_POST, 'seminar_quantity', FILTER_SANITIZE_NUMBER_INT);
$isIncrease = filter_input(INPUT_POST, 'isIncrease', FILTER_VALIDATE_BOOLEAN);

$sql_update = "UPDATE `seminar` SET `Sem_Quantity` = '$seminar_quantity' WHERE Sem_UserID = $_SESSION[uID] AND Sem_Status = 'Pending' AND Sem_Session = '$seminar_session'";
$result_update = mysqli_query($link, $sql_update);

if ($result_update) {
    if ($isIncrease){
        $_SESSION['checkout_ttl'] += 20;
    } else {
        $_SESSION['checkout_ttl'] -= 20;
    }
    echo true;
} else {
    echo false;
}
?>