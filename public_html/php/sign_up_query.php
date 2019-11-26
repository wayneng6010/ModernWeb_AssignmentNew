<?php

require_once 'conn.php';

if (filter_input(INPUT_POST, 'reg_submit', FILTER_SANITIZE_URL) !== null) {
    $reg_fname = filter_input(INPUT_POST, 'reg_fname', FILTER_SANITIZE_STRING);
    $reg_email = filter_input(INPUT_POST, 'reg_email', FILTER_SANITIZE_STRING);
    $reg_hpno = filter_input(INPUT_POST, 'reg_hpno', FILTER_SANITIZE_STRING);
    $reg_pwd = filter_input(INPUT_POST, 'reg_pwd', FILTER_SANITIZE_STRING);
    $reg_cpwd = filter_input(INPUT_POST, 'reg_cpwd', FILTER_SANITIZE_STRING);

    $sql_validate = "SELECT * FROM user WHERE User_Email ='$reg_email'";
    $result_validate = mysqli_query($link, $sql_validate);

    if ($reg_pwd === $reg_cpwd && mysqli_num_rows($result_validate) == 0) {
        $reg_pwd_hash = password_hash($reg_pwd, PASSWORD_DEFAULT);
        $sql_insert = "INSERT INTO user VALUES(null, '$reg_fname', '$reg_email', '$reg_pwd_hash', '$reg_hpno', now())";
        $result_insert = mysqli_query($link, $sql_insert);
        if ($result_insert) {
            echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Sign up successful</p></div>';
            header('refresh:1;url=log_in.php');
        }
    } else {
        echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Email already exist</p></div>';
    }
}
?>