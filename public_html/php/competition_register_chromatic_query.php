<?php

require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: log_in.php');
}
//        echo '<script>alert("'.filter_input(INPUT_GET, 'soloID', FILTER_SANITIZE_STRING).'")</script>';

if (filter_input(INPUT_POST, 'reg_submit', FILTER_SANITIZE_URL) !== null) {
    $solo_ID = filter_input(INPUT_POST, 'solo_ID', FILTER_SANITIZE_NUMBER_INT);
    $solo_category = filter_input(INPUT_POST, 'solo_category', FILTER_SANITIZE_STRING);
    $solo_contestant_name = filter_input(INPUT_POST, 'solo_contestant_name', FILTER_SANITIZE_STRING);
    $solo_title = filter_input(INPUT_POST, 'solo_title', FILTER_SANITIZE_STRING);
    $solo_composer = filter_input(INPUT_POST, 'solo_composer', FILTER_SANITIZE_STRING);
    $solo_arranger = filter_input(INPUT_POST, 'solo_arranger', FILTER_SANITIZE_STRING);
    $solo_accompaniment = filter_input(INPUT_POST, 'solo_accompaniment', FILTER_SANITIZE_STRING);
    $solo_pianist = filter_input(INPUT_POST, 'solo_pianist', FILTER_SANITIZE_STRING);

    if ($solo_accompaniment != "Piano") {
        $solo_pianist = "-";
    }
    
    if ($solo_ID == null) {
        $sql_insert = "INSERT INTO chromatic_cat VALUES(null, $_SESSION[uID] ,'$solo_category', '$solo_contestant_name', '$solo_title', '$solo_composer', '$solo_arranger', '$solo_accompaniment', '$solo_pianist', 'pending', null)";
        $result_insert = mysqli_query($link, $sql_insert);
        if ($result_insert) {
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Saved successfully</p></div>';
            header('refresh:1;url= ' . filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL));
        } else {
            echo '<script>alert("Error occured, please try again")</script>';
        }
    } else {
//        $soloID = filter_input(INPUT_GET, 'soloID', FILTER_SANITIZE_STRING);
        $sql_insert_update = "UPDATE chromatic_cat SET `Solo_Cat`='$solo_category', `Solo_Fname`='$solo_contestant_name', `Solo_Title`='$solo_title',`Solo_Composer`='$solo_composer',`Solo_Arranger`='$solo_arranger',`Solo_Accompaniment`='$solo_accompaniment',`Solo_Pianist`='$solo_pianist' WHERE `Solo_ID`='$solo_ID' AND `Solo_UserID` = $_SESSION[uID]";
        $result_insert_update = mysqli_query($link, $sql_insert_update);
        if ($result_insert_update) {
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Updated successfully</p></div>';
            header('refresh:1;url=cart.php');
        } else {
            echo '<script>alert("Error occured, please try again")</script>';
        }
    }
}

if (filter_input(INPUT_GET, 'soloID', FILTER_SANITIZE_STRING) !== null) {
    $soloID = filter_input(INPUT_GET, 'soloID', FILTER_SANITIZE_STRING);
    $sql_select_update = "SELECT * FROM chromatic_cat WHERE Solo_ID = '$soloID' AND Solo_UserID = $_SESSION[uID]";
    $result_select_update = mysqli_query($link, $sql_select_update);
    $rowcount = mysqli_num_rows($result_select_update);
    if ($rowcount == 0) {
        echo '<script>alert("This registration data does not exist.")</script>';
    } else {
        $item_update = mysqli_fetch_assoc($result_select_update);
        $Solo_Cat = $item_update['Solo_Cat'];
        $Solo_Fname = $item_update['Solo_Fname'];
        $Solo_Title = $item_update['Solo_Title'];
        $Solo_Composer = $item_update['Solo_Composer'];
        $Solo_Arranger = $item_update['Solo_Arranger'];
        $Solo_Accompaniment = $item_update['Solo_Accompaniment'];
        if ($Solo_Accompaniment == "Piano") {
            $Solo_Pianist = $item_update['Solo_Pianist'];
        } 
    }
}
?>