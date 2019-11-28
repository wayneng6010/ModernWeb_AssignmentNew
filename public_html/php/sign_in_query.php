<?php

require_once 'conn.php';

if (filter_input(INPUT_POST, 'login_submit', FILTER_SANITIZE_URL) !== null) {
    $login_email = filter_input(INPUT_POST, 'login_email', FILTER_SANITIZE_STRING);
    $login_pwd = filter_input(INPUT_POST, 'login_pwd', FILTER_SANITIZE_STRING);

    $sql_match = "SELECT * FROM user WHERE User_Email ='$login_email'";
    $result_match = mysqli_query($link, $sql_match);
    $row_match = mysqli_fetch_assoc($result_match);
    $pass_hashed = $row_match['User_Password'];
//    echo "<script>alert('".$pass_hashed."')</script>";
    if (password_verify($login_pwd, $pass_hashed) && mysqli_num_rows($result_match) == 1) {
        $_SESSION['uLogin'] = "success";
        $_SESSION['uID'] = $row_match['User_ID'];
        $_SESSION['uName'] = $row_match['User_Name'];
        echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Login successful</p></div>';
        header('refresh:1;url=competition_register.php');
    } else {
        echo '<div class="msg_box failed"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Invalid email or password</p></div>';
    }
}
?>