<?php

require_once 'conn.php';

if (!isset($_SESSION['uID'])) {
    header('Location: log_in.php');
}

if (filter_input(INPUT_POST, 'reg_submit', FILTER_SANITIZE_URL) !== null) {
    $ensemble_ID = filter_input(INPUT_POST, 'ensemble_ID', FILTER_SANITIZE_NUMBER_INT);
    $ensemble_category = filter_input(INPUT_POST, 'ensemble_category', FILTER_SANITIZE_STRING);
    $ensemble_team_name = filter_input(INPUT_POST, 'ensemble_team_name', FILTER_SANITIZE_STRING);
    $ensemble_member_count = filter_input(INPUT_POST, 'ensemble_member_count', FILTER_SANITIZE_STRING);
    $ensemble_title = filter_input(INPUT_POST, 'ensemble_title', FILTER_SANITIZE_STRING);
    $ensemble_composer = filter_input(INPUT_POST, 'ensemble_composer', FILTER_SANITIZE_STRING);
    $ensemble_arranger = filter_input(INPUT_POST, 'ensemble_arranger', FILTER_SANITIZE_STRING);
    $ensemble_first = filter_input(INPUT_POST, 'ensemble_first', FILTER_SANITIZE_STRING);
    $ensemble_second = filter_input(INPUT_POST, 'ensemble_second', FILTER_SANITIZE_STRING);
    $ensemble_third = filter_input(INPUT_POST, 'ensemble_third', FILTER_SANITIZE_STRING);
    $ensemble_forth = filter_input(INPUT_POST, 'ensemble_forth', FILTER_SANITIZE_STRING);
    $ensemble_bass = filter_input(INPUT_POST, 'ensemble_bass', FILTER_SANITIZE_STRING);
    $ensemble_chord = filter_input(INPUT_POST, 'ensemble_chord', FILTER_SANITIZE_STRING);

    if ($ensemble_member_count == "4") {
        $ensemble_third = "-";
        $ensemble_forth = "-";
    } else if ($ensemble_member_count == "5") {
        $ensemble_forth = "-";
    }
    if ($ensemble_ID == null) {
        $sql_insert = "INSERT INTO ensemble_cat VALUES(null, $_SESSION[uID],'$ensemble_category', '$ensemble_team_name', '$ensemble_member_count', '$ensemble_title', '$ensemble_composer', '$ensemble_arranger', '$ensemble_first', '$ensemble_second', '$ensemble_third', '$ensemble_forth', '$ensemble_bass', '$ensemble_chord', 'pending', null)";
        $result_insert = mysqli_query($link, $sql_insert);
        if ($result_insert) {
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Saved successfully</p></div>';
            header('refresh:1;url= ' . filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL));
        } else {
            echo '<script>alert("Error occured, please try again")</script>';
        }
    } else {
//        $soloID = filter_input(INPUT_GET, 'soloID', FILTER_SANITIZE_STRING);
        $sql_insert_update = "UPDATE ensemble_cat SET `Ensemble_Cat`='$ensemble_category', `Ensemble_TeamName`='$ensemble_team_name', `Ensemble_MemberCount`='$ensemble_member_count', `Ensemble_Title`='$ensemble_title',`Ensemble_Composer`='$ensemble_composer',`Ensemble_Arranger`='$ensemble_arranger',`Ensemble_First`='$ensemble_first',`Ensemble_Second`='$ensemble_second',`Ensemble_Third`='$ensemble_third',`Ensemble_Forth`='$ensemble_forth',`Ensemble_Bass`='$ensemble_bass',`Ensemble_Chord`='$ensemble_chord' WHERE `Ensemble_ID`='$ensemble_ID' AND `Ensemble_UserID` = $_SESSION[uID]";
        $result_insert_update = mysqli_query($link, $sql_insert_update);
        if ($result_insert_update) {
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Updated successfully</p></div>';
            header('refresh:1;url=cart.php');
        } else {
            echo '<script>alert("Error occured, please try again")</script>';
        }
    }
}

if (filter_input(INPUT_GET, 'ensembleID', FILTER_SANITIZE_STRING) !== null) {
    $ensembleID = filter_input(INPUT_GET, 'ensembleID', FILTER_SANITIZE_STRING);
    $sql_select_update = "SELECT * FROM ensemble_cat WHERE Ensemble_ID = '$ensembleID' AND Ensemble_UserID = $_SESSION[uID]";
    $result_select_update = mysqli_query($link, $sql_select_update);
    $rowcount = mysqli_num_rows($result_select_update);
    if ($rowcount == 0) {
        echo '<script>alert("This registration data does not exist.")</script>';
    } else {
        $item_update = mysqli_fetch_assoc($result_select_update);
        $Ensemble_Cat = $item_update['Ensemble_Cat'];
        $Ensemble_TeamName = $item_update['Ensemble_TeamName'];
        $Ensemble_MemberCount = $item_update['Ensemble_MemberCount'];
        $Ensemble_Title = $item_update['Ensemble_Title'];
        $Ensemble_Composer = $item_update['Ensemble_Composer'];
        $Ensemble_Arranger = $item_update['Ensemble_Arranger'];
        $Ensemble_First = $item_update['Ensemble_First'];
        $Ensemble_Second = $item_update['Ensemble_Second'];
        $Ensemble_Bass = $item_update['Ensemble_Bass'];
        $Ensemble_Chord = $item_update['Ensemble_Chord'];

        if ($Ensemble_MemberCount == 5 || $Ensemble_MemberCount == 6) {
            $Ensemble_Third = $item_update['Ensemble_Third'];
        }
        if ($Ensemble_MemberCount == 6) {
            $Ensemble_Forth = $item_update['Ensemble_Forth'];
        }
    }
}
?>