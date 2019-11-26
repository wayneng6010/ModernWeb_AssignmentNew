<?php

require_once 'conn.php';
if (isset($_SESSION['uID'])) {
    $sql_retrieve = "SELECT * FROM user WHERE User_ID ='$_SESSION[uID]'";
    $result_retrieve = mysqli_query($link, $sql_retrieve);
    $row = mysqli_fetch_assoc($result_retrieve);
} else {
    header('Location: log_in.php');
}

if (filter_input(INPUT_POST, 'update_profile_submit', FILTER_SANITIZE_URL) !== null) {
    $reg_fname = filter_input(INPUT_POST, 'pro_fname', FILTER_SANITIZE_STRING);
    $reg_email = filter_input(INPUT_POST, 'pro_email', FILTER_SANITIZE_STRING);
    $reg_hpno = filter_input(INPUT_POST, 'pro_hpno', FILTER_SANITIZE_STRING);

    $sql_validate = "SELECT User_Email FROM user WHERE User_Email='$reg_email' AND User_ID ='$_SESSION[uID]'";
    $result_validate = mysqli_query($link, $sql_validate);
    $row = mysqli_fetch_assoc($result_validate);
    $current_email = $row['User_Email'];

    $sql_validate1 = "SELECT User_Email FROM user WHERE User_Email='$reg_email'";
    $result_validate1 = mysqli_query($link, $sql_validate1);
    $row1 = mysqli_fetch_assoc($result_validate1);
    $existing_email = $row1['User_Email'];

    if (mysqli_num_rows($result_validate) == 1) {
        $sql_update = "UPDATE `user` SET `User_Name`='$reg_fname',`User_Email`='$reg_email',`User_PhoneNo`='$reg_hpno' WHERE `User_ID`='$_SESSION[uID]'";
        $result_update = mysqli_query($link, $sql_update);
        if ($result_update) {
            $_SESSION['uName'] = $reg_fname;
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Updated successfully</p></div>';
            header('refresh:1;url=user_profile.php');
        } else {
            echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Update failed</p></div>';
            header('refresh:1;url=user_profile.php');
        }
    } else if (mysqli_num_rows($result_validate) == 0) {
        if (mysqli_num_rows($result_validate1) == 0) {
            $sql_update = "UPDATE `user` SET `User_Name`='$reg_fname',`User_Email`='$reg_email',`User_PhoneNo`='$reg_hpno' WHERE `User_ID`='$_SESSION[uID]'";
            $result_update = mysqli_query($link, $sql_update);
            if ($result_update) {
                $_SESSION['uName'] = $reg_fname;
                echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Updated successfully</p></div>';
                header('refresh:1;url=user_profile.php');
            } else {
                echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Update failed</p></div>';
                header('refresh:1;url=user_profile.php');
            }
        } else {
            echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Email already exist</p></div>';
            header('refresh:1;url=user_profile.php');
        }
    } else {
        echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Error occured</p></div>';
        header('refresh:1;url=user_profile.php');
    }
}

if (filter_input(INPUT_POST, 'change_pwd_submit', FILTER_SANITIZE_URL) !== null) {
    $pro_pwd = filter_input(INPUT_POST, 'pro_pwd', FILTER_SANITIZE_STRING);
    $pro_new_pwd = filter_input(INPUT_POST, 'pro_new_pwd', FILTER_SANITIZE_STRING);
    $pro_con_pwd = filter_input(INPUT_POST, 'pro_con_pwd', FILTER_SANITIZE_STRING);

    $sql_match = "SELECT * FROM user WHERE User_ID ='$_SESSION[uID]'";
    $result_match = mysqli_query($link, $sql_match);
    $row_match = mysqli_fetch_assoc($result_match);
    $pass_hashed = $row_match['User_Password'];

    if (!(password_verify($pro_pwd, $pass_hashed))) {
        echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Incorrect password</p></div>';
        $_POST['invalid_pwd'] = true;
    } else {
        $newHashPw = password_hash($pro_new_pwd, PASSWORD_DEFAULT);
        $sql2 = "UPDATE `user` SET `User_Password` = '$newHashPw' WHERE `User_ID` ='$_SESSION[uID]'";
        $result2 = mysqli_query($link, $sql2);
        if ($result2) {
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Updated successfully</p></div>';
            header('refresh:1;url=user_profile.php');
        } else {
            echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Error occured</p></div>';
        }
    }
    //echo "<script>alert(".$pro_pwd.")</script>";
}
?>