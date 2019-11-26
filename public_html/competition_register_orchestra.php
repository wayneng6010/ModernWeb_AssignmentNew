<?php
require_once 'php/conn.php';
session_start();
if (!isset($_SESSION['uID'])) {
    header('Location: log_in.php');
}

if (filter_input(INPUT_GET, 'orchestraID', FILTER_SANITIZE_STRING) !== null) {
    $orchestraID = filter_input(INPUT_GET, 'orchestraID', FILTER_SANITIZE_STRING);
    $sql_select_update = "SELECT * FROM orchestra_cat WHERE Orchestra_ID = '$orchestraID' AND Orchestra_UserID = $_SESSION[uID]";
    $result_select_update = mysqli_query($link, $sql_select_update);
    $rowcount = mysqli_num_rows($result_select_update);
    if ($rowcount == 0) {
        echo '<script>alert("This registration data does not exist.")</script>';
    } else {
        $item_update = mysqli_fetch_assoc($result_select_update);
        $Orchestra_Cat = $item_update['Orchestra_Cat'];
        $Orchestra_Name = $item_update['Orchestra_Name'];
        $Orchestra_Title = $item_update['Orchestra_Title'];
        $Orchestra_Composer = $item_update['Orchestra_Composer'];
        $Orchestra_Arranger = $item_update['Orchestra_Arranger'];
        $Orchestra_SectionName = $item_update['Orchestra_SectionName'];
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register - Orchestra</title>
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
        <script>
            function selectedRowToInput()
            {
                var table = document.getElementById("orchestra_member_list");
                for (var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function ()
                    {
                        // get the seected row index
                        rIndex = this.rowIndex;
//                        alert(this.cells[0].innerHTML);
                        $("#orchestra_section_name").val(this.cells[1].innerHTML);
                        $("#orchestra_section_members").val(this.cells[3].innerHTML.replace(/<br>/g, ', ').substring(0, this.cells[3].innerHTML.replace(/<br>/g, ', ').length - 2));
                        $("#orchestra_section_add").html("Update");
                    };
                }
            }

            function selectedRowToDelete(val) {

                var section_name = val;

                var result = confirm("Are you sure to delete this section?");
                if (result) {
                    $("#section_name_to_delete").val(section_name).trigger('change');
                }

                
            }


        </script>
        <?php
        if (isset($Orchestra_SectionName)) {
            echo '<script>var orchestra_members_restore = ' . $Orchestra_SectionName . ';</script>';
        }
        ?>

    </head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="msg_box success" style="display: none;"><img src="../Asset/correct_icon.svg" width="25" alt="@" ><p>Register Successful</p></div>
        <div class="msg_box failed" style="display: none;"><img src="../Asset/cross_icon.svg" width="25" alt="@"><p>Register Failed</p></div>

        <!--height spacing-->
        <div class="height_spacing"></div>

        <div class="container-fluid mt-4 px-5">
            <div class="center mt-3 d-block mx-auto">
                <div class="py-0">
                    <h2 class="text-center">Orchestra Registration</h2>
                    <hr>

                    <form name="orchestra_form" id="orchestra_form" method="post" onsubmit="return orchestra_form_validate()">
                        <input type="text" name="section_name_to_delete" id="section_name_to_delete" novalidate style="display: none;">

                        <input type="number" name="orchestra_ID" id="orchestra_ID" novalidate value="<?php
                        if (filter_input(INPUT_GET, 'orchestraID', FILTER_SANITIZE_STRING) !== null) {
                            echo filter_input(INPUT_GET, 'orchestraID', FILTER_SANITIZE_STRING);
                        }
                        ?>" style="display: none;">


                        <div class="form-group row col-sm-8 px-0 mt-4 mx-auto mb-4">
                            <label for="orchestra_category" class="col-form-label col-sm-2">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="orchestra_category" id="orchestra_category" style="border-color: grey;">
                                    <option disabled>Choose a category</option>
                                    <option <?php
                                    if (isset($Orchestra_Cat)) {
                                        if ($Orchestra_Cat == 'cat1') {
                                            echo"selected";
                                        }
                                    }
                                    ?> value="cat1">Elementary (age of 12 and below)</option>
                                    <option <?php
                                    if (isset($Orchestra_Cat)) {
                                        if ($Orchestra_Cat == 'cat2') {
                                            echo"selected";
                                        }
                                    }
                                    ?> value="cat2">Middle-High School (age of 13~18)</option>
                                    <option <?php
                                    if (isset($Orchestra_Cat)) {
                                        if ($Orchestra_Cat == 'cat3') {
                                            echo"selected";
                                        }
                                    }
                                    ?> value="cat3">Adults (age of 19~59)</option>
                                    <option <?php
                                    if (isset($Orchestra_Cat)) {
                                        if ($Orchestra_Cat == 'cat4') {
                                            echo"selected";
                                        }
                                    }
                                    ?> value="cat4">Senior (age of 60 and above)</option>
                                </select>
                            </div>
                        </div>

                        <!--form left-->
                        <div class="col-sm-6 float-left">
                            <label>Orchestra and Song Details</label>
                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/contestant_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="orchestra_name" id="orchestra_name" placeholder="Orchestra Name" value="<?php
                                if (isset($Orchestra_Name)) {
                                    echo $Orchestra_Name;
                                }
                                ?>">
                                <div class="error_msg" id="oname_empty"><p>Please fill in orchestra name.</p></div>
                                <div class="error_msg" id="oname_maxlength"><p>Orchestra name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="oname_isnum"><p>Orchestra name should not be an number or contain any number.</p></div>
                                <div class="error_msg" id="oname_exist"><p>Orchestra name already exist.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/song_title_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="orchestra_title" id="orchestra_title" placeholder="Song Title" value="<?php
                                if (isset($Orchestra_Title)) {
                                    echo $Orchestra_Title;
                                }
                                ?>">
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
                                <input type="text" class="form-control" name="orchestra_composer" class="orchestra_composer" id="orchestra_composer" placeholder="Composer" value="<?php
                                if (isset($Orchestra_Composer)) {
                                    echo $Orchestra_Composer;
                                }
                                ?>">
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
                                <input type="text" class="form-control" name="orchestra_arranger" class="orchestra_arranger" id="orchestra_arranger" placeholder="Arranger" value="<?php
                                if (isset($Orchestra_Arranger)) {
                                    echo $Orchestra_Arranger;
                                }
                                ?>">
                                <div class="error_msg" id="arranger_empty"><p>Please fill in arranger name.</p></div>
                                <div class="error_msg" id="arranger_maxlength"><p>Arranger name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="arranger_isnum"><p>Arranger name should not be an number or contain any number.</p></div>
                            </div>
                        </div>

                        <!--form right-->
                        <div id="orchestra_members_outer" class="col-sm-6 float-right">
                            <label for="solo_accompaniment">Orchestra Members</label>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/group_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="orchestra_section_name" class="orchestra_section_name" id="orchestra_section_name" placeholder="Section Name">
                                <div class="error_msg" id="section_empty"><p>Please fill in section name.</p></div>
                                <div class="error_msg" id="section_maxlength"><p>Section name is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="section_isnum"><p>Section name should not be an number or contain any number.</p></div>
                            </div>

                            <div class="input-group mb-3 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="../Asset/harmonica_icon.svg" alt="@" width="20">
                                    </div>
                                </div>
                                <textarea class="form-control" name="orchestra_section_members" id="orchestra_section_members" style="height: 92px;" placeholder="Section Members' Names ( separate each member by an new line or comma )"></textarea>
                                <div class="error_msg" id="member_empty"><p>Please fill at least one member name or one of the member's name is missing.</p></div>
                                <div class="error_msg" id="member_maxlength"><p>One or some of the member names is too long. Maximum 30 characters.</p></div>
                                <div class="error_msg" id="member_isnum"><p>All of the member names should not be an number or contain any number.</p></div>
                            </div>

                            <div class="container row mx-0 px-0">
                                <div class="form-group col-sm-8 px-1">
                                    <input type="text" class="form-control text-center" class="orchestra_section_members_count" id="orchestra_section_members_count" placeholder="-" readonly>
                                </div>

                                <div class="form-group col-sm-4 px-1">
                                    <button type="button" id="orchestra_section_add" class="btn btn-success btn-block">Add Section</button>
                                </div>
                            </div>

                        </div>

                        <div class="clearfix pt-4" style="clear: both;">
                            <label>Orchestra Members Overview</label>
                            <table class="table table-striped" id="orchestra_member_list">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Section Name</th>
                                        <th scope="col">Number of Members</th>
                                        <th scope="col">Members</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="list_empty_row">
                                        <th colspan="5" class="text-center">No section is added</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="error_msg" id="member_count_insufficient"><p>Total number of orchestra member should be at least 7 person.</p></div>

                        <div class="col-sm-2 float-left px-3 mt-2 mb-4">
                            <button type="button" id="reset_btn" class="btn btn-info btn-block">Reset</button>
                        </div>
                        <div class="col-sm-3 float-right px-3 mt-2 mb-4">
                            <button type="submit" name="reg_submit" id="reg_submit" class="btn btn-success btn-block"><?php
                                if (isset($orchestraID)) {
                                    echo "Update";
                                } else {
                                    echo "Confirm";
                                }
                                ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </body>
    <script>
        function restore_section(orchestra_members_restore) {
//                alert(orchestra_members_restore);
            $("#orchestra_member_list tbody tr").remove();

            var counter = 1;
            var total_member = 0;

            for (var i in orchestra_members_restore)
            {
                var name_list = "";

                $.each(orchestra_members_restore[i], function (index, value) {
                    name_list += value + "<br>";
                });
                var name_list_stored = name_list.replace(/<br>/g, ", ");
                name_list_stored = name_list_stored.substring(0, name_list_stored.length - 2);
                $('#orchestra_member_list tbody').append('<tr><th>' + counter + '</th><td>'
                        + i + '</td><td class="member_number">' + orchestra_members_restore[i].length + '</td><td>' + name_list
                        + '</td><td><button onclick="edit_restore(this.value)" class="text-primary edit_btn" type="button" value="' + i + ':' + name_list_stored + '">' + 'Edit' + '</button>\n\
                        <button onclick="selectedRowToDelete(this.value)" class="text-primary edit_btn del_btn" type="button" value="' + i + '">' + 'Delete' + '</button></td></tr>');

                counter += 1;
                total_member += orchestra_members_restore[i].length;
            }

            $('#orchestra_member_list tbody').append('<tr style="background-color: #7a7a7a; color: white;"><td></td><td class="text-right"><b>Total</b></td><td id="total_member">' + total_member + '</td><td></td><td></td></tr>');

            $("#orchestra_section_name").val("");
            $("#orchestra_section_members").val("");
        }

        if (typeof orchestra_members_restore !== 'undefined') {
            restore_section(orchestra_members_restore);
        }

        function edit_restore(val) {
//            orchestra_section_members
//            orchestra_section_name
//            alert($("#orchestra_section_member").val());
//            var orchestra_members = JSON.parse($("#orchestra_section_member").val());
            var value = val.split(':');
            var name = value[0];
            var members = value[1];

            $("#orchestra_section_name").val(name);
            $("#orchestra_section_members").val(members);
            $("#orchestra_section_add").html("Update");
//            alert(orchestra_members);
//            alert(orchestra_members[val]);
        }

        if (typeof document.getElementsByClassName("msg_box") !== 'undefined') {
            setInterval(function () {
                $(".msg_box").fadeOut();
            }, 4000);
        }

    </script>
</html>
