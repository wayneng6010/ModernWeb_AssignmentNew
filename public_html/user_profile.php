<?php
session_start();
include 'php/user_profile_query.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../Asset/tab_icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="javascript.js"></script>
        <style>
            #collapse_btn2:focus, #collapse_btn2:active  {
                box-shadow: none;
                outline: none !important;
            }
        </style>
        <script>
            setInterval(function () {
                $(".msg_box").fadeOut();
            }, 2000);

        </script>
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <!--height spacing-->
        <div class="height_spacing"></div>

        <!--content-->
        <div class="container-fluid mt-5 px-5">
            <div class="login_container center d-block mx-auto w-50">
                <h2 class="text-center">My Profile</h2>                    
                <hr>
                <p class="text-center mt-4">
                    <a style="background-color: #3E4551; color: white; cursor: pointer; width: 220px;" class="btn my-2" id="collapse_btn1">Personal Info</a>
                    <button style="background-color: #cbccd4; color: white; width: 220px;" class="btn" id="collapse_btn2" type="button">Change Password</button>
                </p>


                <div style="display: block;" id="update_profile_form">
                    <form class="d-block mx-auto pt-2" name="update_profile_form" method="post" onsubmit="return update_profile_form_validate()" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL) ?>">
                        <!--username-->
                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/contact_name_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="pro_fname" id="pro_fname" placeholder="Full Name" value="<?php echo (isset($row['User_Name'])) ? $row['User_Name'] : null; ?>">
                            <div class="error_msg" id="fname_empty"><p>Please fill in your name.</p></div>
                            <div class="error_msg" id="fname_maxlength"><p>Name is too long. Maximum 30 characters.</p></div>
                            <div class="error_msg" id="fname_isnum"><p>Name should not be an number or contain any number.</p></div>
                            <div class="error_msg" id="fname_notFull"><p>Please fill in your full name.</p></div>
                        </div>
                        <!--email-->
                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/contact_email_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="pro_email" id="pro_email" placeholder="Email" value="<?php echo (isset($row['User_Email'])) ? $row['User_Email'] : null; ?>">
                            <div class="error_msg" id="email_empty"><p>Please fill in your email.</p></div>
                            <div class="error_msg" id="email_invalid"><p>Please fill in correct email format.</p></div>
                        </div>
                        <!--phone number-->
                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/signup_phone_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="pro_hpno" id="pro_hpno" placeholder="Phone Number (e.g. 01112345678)" value="<?php echo (isset($row['User_PhoneNo'])) ? $row['User_PhoneNo'] : null; ?>">
                            <div class="error_msg" id="hpno_empty"><p>Please fill in your phone number.</p></div>
                            <div class="error_msg" id="hpno_isMax"><p>Phone number of Malaysia after prefix should be maximum of 8 digits.</p></div>
                            <div class="error_msg" id="hpno_isMin"><p>Phone number of Malaysia after prefix should be at least 7 digits.</p></div>
                            <div class="error_msg" id="hpno_isnum"><p>Phone number should not contain character other than number.</p></div>
                            <div class="error_msg" id="hpno_prefix"><p>Phone number of Malaysia should contain prefix of either 01 or 04.</p></div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mb-2" name="update_profile_submit">Update Info</button>
                    </form>
                </div>

                <div style="display: none;" id="change_pwd_form">
                    <form class="d-block mx-auto pt-2" id="change_pwd_form" name="change_pwd_form" method="post" onsubmit="return change_pwd_validate()" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL) ?>">
                        <!--password-->
                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/login_psw_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="password" class="form-control" name="pro_pwd" id="pro_pwd" placeholder="Password" value="<?php
                            if (isset($_POST['pro_pwd'])) {
                                echo $_POST['pro_pwd'];
                            }
                            ?>">
                            <div class="error_msg" id="pwd_empty"><p>Please fill in your password.</p></div>
                            <div class="error_msg" id="pwd_maxlength"><p>Password is too long. Maximum 20 characters.</p></div>
                            <div class="error_msg" id="pwd_secure"><p>Password should be at least 8 characters.</p></div>
                            <div class="error_msg" id="pwd_incorrect"><p>Incorrect password.</p></div>
                        </div>
                        <!--new password-->
                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/login_psw_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="password" class="form-control" name="pro_new_pwd" id="pro_new_pwd" placeholder="New Password" value="<?php
                            if (isset($_POST['pro_new_pwd'])) {
                                echo $_POST['pro_new_pwd'];
                            }
                            ?>">
                            <div class="error_msg" id="new_pwd_empty"><p>Please fill in your password.</p></div>
                            <div class="error_msg" id="new_pwd_maxlength"><p>Password is too long. Maximum 20 characters.</p></div>
                            <div class="error_msg" id="new_pwd_secure"><p>Password should be at least 8 characters.</p></div>
                        </div>
                        <!--confirm new password-->
                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/login_psw_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="password" class="form-control" name="pro_con_pwd" id="pro_con_pwd" placeholder="Confirm New Password" value="<?php
                            if (isset($_POST['pro_con_pwd'])) {
                                echo $_POST['pro_con_pwd'];
                            }
                            ?>">
                            <div class="error_msg" id="cpwd_empty"><p>Please fill in your password.</p></div>
                            <div class="error_msg" id="cpwd_maxlength"><p>Password is too long. Maximum 20 characters.</p></div>
                            <div class="error_msg" id="cpwd_secure"><p>Password should be at least 8 characters.</p></div>
                            <div class="error_msg" id="cpwd_match"><p>Confirm password is not matching.</p></div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mb-2" name="change_pwd_submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        document.getElementById("collapse_btn1").click();

        document.getElementById("collapse_btn1").onclick = function () {
            document.getElementById("update_profile_form").style.display = "block";
            document.getElementById("change_pwd_form").style.display = "none";
            document.getElementById("collapse_btn1").style.backgroundColor = "#3E4551";
            document.getElementById("collapse_btn2").style.backgroundColor = "#cbccd4";
        };

        document.getElementById("collapse_btn2").onclick = function () {
            document.getElementById("update_profile_form").style.display = "none";
            document.getElementById("change_pwd_form").style.display = "block";
            document.getElementById("collapse_btn1").style.backgroundColor = "#cbccd4";
            document.getElementById("collapse_btn2").style.backgroundColor = "#3E4551";
        };
    </script>
</html>

<?php
if (isset($_POST['invalid_pwd'])) {
    echo "<script>document.getElementById('collapse_btn2').click();</script>";
}
?>
