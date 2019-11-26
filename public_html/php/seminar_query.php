<?php

require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: log_in.php');
}

if (filter_input(INPUT_POST, 'reg_submit', FILTER_SANITIZE_URL) !== null) {
    $seminar_session = filter_input(INPUT_POST, 'seminar_session', FILTER_SANITIZE_STRING);
    $seminar_quantity = filter_input(INPUT_POST, 'seminar_quantity', FILTER_SANITIZE_NUMBER_INT);

    $sql_select_seminar = "SELECT * FROM seminar WHERE Sem_UserID = $_SESSION[uID] AND Sem_Status = 'Pending' AND Sem_Session = '$seminar_session' ORDER BY Sem_Session";
    $result_select_seminar = mysqli_query($link, $sql_select_seminar);
    if (mysqli_num_rows($result_select_seminar) > 0) {
        $row = mysqli_fetch_assoc($result_select_seminar);
        if ($row['Sem_Quantity'] + $seminar_quantity > 5) {
            echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Max 5 tickets per purchase</p></div>';
        } else {
            $sql_update = "UPDATE `seminar` SET `Sem_Quantity` = `Sem_Quantity` + '$seminar_quantity' WHERE Sem_UserID = $_SESSION[uID] AND Sem_Status = 'Pending' AND Sem_Session = '$seminar_session'";
            $result_update = mysqli_query($link, $sql_update);
            if ($result_update) {
                echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Updated successfully</p></div>';
                header('refresh:1;url= ' . filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL));
            } else {
                echo '<script>alert("Error occured, please try again")</script>';
            }
        }
    } else {
        $sql_insert = "INSERT INTO seminar VALUES(null, $_SESSION[uID] , '$seminar_session', $seminar_quantity, 'pending', null)";
        $result_insert = mysqli_query($link, $sql_insert);
        if ($result_insert) {
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Saved successfully</p></div>';
            header('refresh:1;url= ' . filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL));
        } else {
            echo '<script>alert("Error occured, please try again")</script>';
        }
    }
}
?>