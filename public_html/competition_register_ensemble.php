<?php
session_start();
include 'php/competition_register_ensemble_query.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register - Ensemble</title>
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
    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <!--height spacing-->
        <div class="height_spacing"></div>

        <div class="container-fluid mt-4 px-5">
            <div class="center mt-3 d-block mx-auto">
                <div class="py-0">
                    <h2 class="text-center">Ensemble Registration</h2>
                    <hr>

                    <form name="ensemble_form" method="post" onsubmit="return ensemble_form_validate()" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL) ?>">
                        <input type="number" name="ensemble_ID" novalidate value="<?php
                        if (filter_input(INPUT_GET, 'ensembleID', FILTER_SANITIZE_STRING) !== null) {
                            echo filter_input(INPUT_GET, 'ensembleID', FILTER_SANITIZE_STRING);
                        }
                        ?>" style="display: none;">
                        <div class="form-group row col-sm-8 px-0 mt-4 mx-auto mb-4">
                            <label for="solo_category" class="col-form-label col-sm-2">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ensemble_category" id="ensemble_category" style="border-color: grey;" required>
                                    <option disabled>Choose a category</option>
                                    <option <?php if (isset($Ensemble_Cat)) {
                            if ($Ensemble_Cat == 'cat1') {
                                echo"selected";
                            }
                        } ?> value="cat1">Elementary (age of 12 and below)</option>
                                    <option <?php if (isset($Ensemble_Cat)) {
                            if ($Ensemble_Cat == 'cat2') {
                                echo"selected";
                            }
                        } ?> value="cat2">Middle-High School (age of 13~18)</option>
                                    <option <?php if (isset($Ensemble_Cat)) {
                            if ($Ensemble_Cat == 'cat3') {
                                echo"selected";
                            }
                        } ?> value="cat3">Adults (age of 19~59)</option>
                                    <option <?php if (isset($Ensemble_Cat)) {
                            if ($Ensemble_Cat == 'cat4') {
                                echo"selected";
                            }
                        } ?> value="cat4">Senior (age of 60 and above)</option>
                                </select>
                            </div>
                        </div>

                        <!--form left-->
                        <div class="col-sm-6 float-left">
                            <label>Team and Song Details</label>
                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/contestant_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_team_name" id="ensemble_team_name" placeholder="Team Name" value="<?php if (isset($Ensemble_TeamName)) {
                            echo $Ensemble_TeamName;
                        } ?>">
                                <div class="error_msg" id="ename_empty"><p>Please fill in team name.</p></div>
                                <div class="error_msg" id="ename_maxlength"><p>Team name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="ename_isnum"><p>Team name should not be an number or contain any number.</p></div>
                                <div class="error_msg" id="teamname_exist"><p>Team name already exist.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/group_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <select class="form-control" name="ensemble_member_count" id="ensemble_member_count"  required>
                                    <option disabled>Choose number of team members</option>
                                    <option <?php if (isset($Ensemble_MemberCount)) {
                            if ($Ensemble_MemberCount == '4') {
                                echo"selected";
                            }
                        } ?> value="4">Quartet (4 person)</option>
                                    <option <?php if (isset($Ensemble_MemberCount)) {
                            if ($Ensemble_MemberCount == '5') {
                                echo"selected";
                            }
                        } ?> value="5">Quintet (5 person)</option>
                                    <option <?php if (isset($Ensemble_MemberCount)) {
                            if ($Ensemble_MemberCount == '6') {
                                echo"selected";
                            }
                        } ?> value="6">Sextet (6 person)</option>
                                </select>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/song_title_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_title" id="ensemble_title" placeholder="Song Title" value="<?php if (isset($Ensemble_Title)) {
                            echo $Ensemble_Title;
                        } ?>">
                                <div class="error_msg" id="title_empty"><p>Please fill in song title.</p></div>
                                <div class="error_msg" id="title_maxlength"><p>Song title is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="title_isnum"><p>Song title should not be an number.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/composer_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_composer" id="ensemble_composer" placeholder="Composer" value="<?php if (isset($Ensemble_Composer)) {
                            echo $Ensemble_Composer;
                        } ?>">
                                <div class="error_msg" id="compsr_empty"><p>Please fill in composer name.</p></div>
                                <div class="error_msg" id="compsr_maxlength"><p>Composer name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="compsr_isnum"><p>Composer name should not be an number or contain any number.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/arranger_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_arranger" id="ensemble_arranger" placeholder="Arranger" value="<?php if (isset($Ensemble_Arranger)) {
                            echo $Ensemble_Arranger;
                        } ?>">
                                <div class="error_msg" id="arranger_empty"><p>Please fill in arranger name.</p></div>
                                <div class="error_msg" id="arranger_maxlength"><p>Arranger name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="arranger_isnum"><p>Arranger name should not be an number or contain any number.</p></div>
                            </div>
                        </div>

                        <!--form right-->
                        <div class="col-sm-6 float-right">
                            <label for="solo_accompaniment">Team Members</label>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/harmonica_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_first" id="ensemble_first" placeholder="1st Player Name" value="<?php if (isset($Ensemble_First)) {
                            echo $Ensemble_First;
                        } ?>">
                                <div class="error_msg" id="first_empty"><p>Please fill in first player name.</p></div>
                                <div class="error_msg" id="firste_maxlength"><p>First player name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="first_isnum"><p>First player name should not be an number or contain any number.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/harmonica_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_second" id="ensemble_second" placeholder="2nd Player Name" value="<?php if (isset($Ensemble_Second)) {
                            echo $Ensemble_Second;
                        } ?>">
                                <div class="error_msg" id="second_empty"><p>Please fill in second player name.</p></div>
                                <div class="error_msg" id="second_maxlength"><p>Second player name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="second_isnum"><p>Second player name should not be an number or contain any number.</p></div>
                            </div>

                            <div id="ensemble_third_outer" class="input-group mb-3 mr-sm-2 <?php if (!isset($Ensemble_Third)) {
                            echo "d-none";
                        } ?>">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/harmonica_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_third" id="ensemble_third" placeholder="3rd Player Name" value="<?php if (isset($Ensemble_Third)) {
                            echo $Ensemble_Third;
                        } ?>">
                                <div class="error_msg" id="third_empty"><p>Please fill in third player name.</p></div>
                                <div class="error_msg" id="third_maxlength"><p>Third player name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="third_isnum"><p>Third player name should not be an number or contain any number.</p></div>
                            </div>

                            <div id="ensemble_forth_outer" class="input-group mb-3 mr-sm-2 <?php if (!isset($Ensemble_Forth)) {
                            echo "d-none";
                        } ?>">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/harmonica_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_forth" id="ensemble_forth" placeholder="4th Player Name" value="<?php if (isset($Ensemble_Forth)) {
                            echo $Ensemble_Forth;
                        } ?>">
                                <div class="error_msg" id="forth_empty"><p>Please fill in forth player name.</p></div>
                                <div class="error_msg" id="forth_maxlength"><p>Forth player name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="forth_isnum"><p>Forth player name should not be an number or contain any number.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/bass_harmonica_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_bass" id="ensemble_bass" placeholder="Bass Player Name" value="<?php if (isset($Ensemble_Bass)) {
                            echo $Ensemble_Bass;
                        } ?>">
                                <div class="error_msg" id="bass_empty"><p>Please fill in bass player name.</p></div>
                                <div class="error_msg" id="bass_maxlength"><p>Bass player name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="bass_isnum"><p>Bass player name should not be an number or contain any number.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/chord_harmonica_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="ensemble_chord" id="ensemble_chord" placeholder="Chord Player Name" value="<?php if (isset($Ensemble_Chord)) {
                            echo $Ensemble_Chord;
                        } ?>">
                                <div class="error_msg" id="chord_empty"><p>Please fill in chord player name.</p></div>
                                <div class="error_msg" id="chord_maxlength"><p>Chord player name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="chord_isnum"><p>Chord player name should not be an number or contain any number.</p></div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-2 float-left px-3 mt-2 mb-4">
                            <button type="button" id="reset_btn" class="btn btn-info btn-block">Reset</button>
                        </div>
                        <div class="col-sm-3 float-right px-3 mt-2 mb-4">
                            <button type="submit" name="reg_submit" id="reg_submit" class="btn btn-success btn-block"><?php if (isset($ensembleID)) {
                            echo "Update";
                        } else {
                            echo "Confirm";
                        } ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </body>
</html>
