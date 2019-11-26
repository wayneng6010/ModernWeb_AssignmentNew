<?php

require_once 'conn.php';

if (isset($_SESSION['uID'])) {
    $uid = $_SESSION['uID'];
    $sql_select_chromatic = "SELECT * FROM chromatic_cat WHERE Solo_UserID = $_SESSION[uID] AND Solo_Status = 'Pending' ORDER BY Solo_Cat";
    $result_select_chromatic = mysqli_query($link, $sql_select_chromatic);
    
    $sql_select_ensemble = "SELECT * FROM ensemble_cat WHERE Ensemble_UserID = $_SESSION[uID] AND Ensemble_Status = 'Pending' ORDER BY Ensemble_Cat";
    $result_select_ensemble = mysqli_query($link, $sql_select_ensemble);
    
    $sql_select_orchestra = "SELECT * FROM orchestra_cat WHERE Orchestra_UserID = $_SESSION[uID] AND Orchestra_Status = 'Pending' ORDER BY Orchestra_Cat";
    $result_select_orchestra = mysqli_query($link, $sql_select_orchestra);
    
    $sql_select_seminar = "SELECT * FROM seminar WHERE Sem_UserID = $_SESSION[uID] AND Sem_Status = 'Pending' ORDER BY Sem_Session";
    $result_select_seminar = mysqli_query($link, $sql_select_seminar);

} else {
    header('Location: log_in.php');
}

if (filter_input(INPUT_POST, 'checkout_btn', FILTER_SANITIZE_URL) !== null) {
    header("Refresh:0");
    header('Location: vendor/checkout.php');
}
?>