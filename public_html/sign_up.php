<?php
session_start();
include 'php/sign_up_query.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../Asset/tab_icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="javascript.js"></script>
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        
        <!--height spacing-->
        <div class="height_spacing"></div>

        <!--content-->
        <div class="container-fluid mt-5 px-5">
            <div class="login_container center d-block mx-auto w-50">
                <h2 class="text-center">Register an Account</h2>                    
                <hr>
                <form class="d-block mx-auto pt-2" name="register_form" method="post" onsubmit="return register_form_validate()" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL) ?>">
                    <!--username-->
                    <div class="input-group mb-3 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="../Asset/contact_name_icon.svg" alt="@" width="20">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="reg_fname" id="reg_fname" placeholder="Full Name">
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
                        <input type="text" class="form-control" name="reg_email" id="reg_email" placeholder="Email">
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
                        <input type="text" class="form-control" name="reg_hpno" id="reg_hpno" placeholder="Phone Number (e.g. 01112345678)">
                        <div class="error_msg" id="hpno_empty"><p>Please fill in your phone number.</p></div>
                        <div class="error_msg" id="hpno_isMax"><p>Phone number of Malaysia after prefix should be maximum of 8 digits.</p></div>
                        <div class="error_msg" id="hpno_isMin"><p>Phone number of Malaysia after prefix should be at least 7 digits.</p></div>
                        <div class="error_msg" id="hpno_isnum"><p>Phone number should not contain character other than number.</p></div>
                        <div class="error_msg" id="hpno_prefix"><p>Phone number of Malaysia should start from 0.</p></div>
                    </div>
                    <!--password-->
                    <div class="input-group mb-3 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="../Asset/login_psw_icon.svg" alt="@" width="20">
                            </div>
                        </div>
                        <input type="password" class="form-control" name="reg_pwd" id="reg_pwd" placeholder="Password">
                        <div class="error_msg" id="pwd_empty"><p>Please fill in your password.</p></div>
                        <div class="error_msg" id="pwd_maxlength"><p>Password is too long. Maximum 20 characters.</p></div>
                        <div class="error_msg" id="pwd_secure"><p>Password should be at least 8 characters.</p></div>
                    </div>
                    <!--confirm password-->
                    <div class="input-group mb-3 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="../Asset/login_psw_icon.svg" alt="@" width="20">
                            </div>
                        </div>
                        <input type="password" class="form-control" name="reg_cpwd" id="reg_cpwd" placeholder="Confirm Password">
                        <div class="error_msg" id="cpwd_empty"><p>Please fill in your password.</p></div>
                        <div class="error_msg" id="cpwd_maxlength"><p>Password is too long. Maximum 20 characters.</p></div>
                        <div class="error_msg" id="cpwd_secure"><p>Password should be at least 8 characters.</p></div>
                        <div class="error_msg" id="cpwd_match"><p>Confirm password is not matching.</p></div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block mb-2" name="reg_submit">SIGN UP</button>
                    <p class="text-center">
                        <a href="log_in.php">Log in your account &#8594;</a>
                    </p>
                </form>
            </div>
        </div>


    </body>
</html>
