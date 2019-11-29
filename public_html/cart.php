<?php
session_start();
include 'php/cart_query.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cart - Overview</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../Asset/tab_icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="styles.css">
        <style>
            button[type="button"] {
                background: none;
                border: none;
                outline: none;
            }    
        </style>
        <script src="javascript.js">
        </script>
    </head>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="msg_box delete" style="display: none;"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Deleted successfully</p></div>
        <div class="msg_box update" style="display: none;"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Updated successfully</p></div>
        <!--height spacing-->
        <div class="height_spacing"></div>

        <div class="container-fluid mt-4 px-5">
            <h2 class="text-center">Registration Submission Overview</h2>
            <hr>
            <!--chromatic solo table-->
            <h4 class="text-center mt-4 mb-3">Chromatic Solo</h4>
            <table class="table table-striped mb-5" id="solo_overview">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Song Title</th>
                        <th scope="col">Composer</th>
                        <th scope="col">Arranger</th>
                        <th scope="col">Accompaniment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $counter_ttl = 0;
                    $rowcount = mysqli_num_rows($result_select_chromatic);
                    $counter = 1;
                    if ($rowcount == 0) {
                        echo '<tr id="list_empty_row"><th colspan="8" class="text-center">No registration</th></tr>';
                    }
                    while ($row = mysqli_fetch_assoc($result_select_chromatic)) {
                        $counter_ttl += 1;
                        switch ($row['Solo_Cat']) {
                            case "cat1":
                                $Solo_Cat = "Elementary";
                                break;
                            case "cat2":
                                $Solo_Cat = "Middle-High School";
                                break;
                            case "cat3":
                                $Solo_Cat = "Adults";
                                break;
                            case "cat4":
                                $Solo_Cat = "Seniors";
                                break;
                            default:
                                $Solo_Cat = "Unknown";
                                break;
                        }
                        if ($row['Solo_Accompaniment'] == "Piano") {
                            $Solo_Accompaniment = $row['Solo_Pianist'];
                        } else {
                            $Solo_Accompaniment = $row['Solo_Accompaniment'];
                        }
                        echo "<tr>
                                <td>" . $counter . "</td>
                                <td>" . $Solo_Cat . "</td>
                                <td>" . $row['Solo_Fname'] . "</td>
                                <td>" . $row['Solo_Title'] . "</td>
                                <td>" . $row['Solo_Composer'] . "</td>
                                <td>" . $row['Solo_Arranger'] . "</td>
                                <td>" . $Solo_Accompaniment . "</td>
                                <td>
                                    <a href='competition_register_chromatic.php?soloID=" . $row['Solo_ID'] . "'><img src='../Asset/edit_icon.svg' width='20' style='margin-top: -7px;'></a>
                                    <button type='button' class='chromatic_del_btn' value='" . $row['Solo_ID'] . "'><img src='../Asset/del_icon.svg' width='20' style='margin-top: -7px;'></button>
                                </td>
                             </tr>";
                        $counter += 1;
                    }
                    ?>
                </tbody>
            </table>

            <!--ensemble table-->
            <h4 class="text-center mb-3">Ensemble</h4>
            <table class="table table-striped mb-5" id="ensemble_overview">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">Song Title</th>
                        <th scope="col">Composer</th>
                        <th scope="col">Arranger</th>
                        <th scope="col">Member</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rowcount = mysqli_num_rows($result_select_ensemble);
                    $counter = 1;
                    if ($rowcount == 0) {
                        echo '<tr id="list_empty_row"><th colspan="8" class="text-center">No registration</th></tr>';
                    }
                    while ($row = mysqli_fetch_assoc($result_select_ensemble)) {
                        $counter_ttl += $row['Ensemble_MemberCount'];
                        switch ($row['Ensemble_Cat']) {
                            case "cat1":
                                $Ensemble_Cat = "Elementary";
                                break;
                            case "cat2":
                                $Ensemble_Cat = "Middle-High School";
                                break;
                            case "cat3":
                                $Ensemble_Cat = "Adults";
                                break;
                            case "cat4":
                                $Ensemble_Cat = "Seniors";
                                break;
                            default:
                                $Ensemble_Cat = "Unknown";
                                break;
                        }

                        $Ensemble_Member = "First - " . $row['Ensemble_First'] . "<br>" .
                                "Second - " . $row['Ensemble_Second'] . "<br>";

                        if ($row['Ensemble_MemberCount'] == 5 || $row['Ensemble_MemberCount'] == 6) {
                            $Ensemble_Member .= "Third - " . $row['Ensemble_Third'] . "<br>";
                        }
                        if ($row['Ensemble_MemberCount'] == 6) {
                            $Ensemble_Member .= "Forth - " . $row['Ensemble_Forth'] . "<br>";
                        }

                        $Ensemble_Member .= "Bass - " . $row['Ensemble_Bass'] . "<br>" .
                                "Chord - " . $row['Ensemble_Chord'] . "<br>";

                        echo "<tr>
                                <td>" . $counter . "</td>
                                <td>" . $Ensemble_Cat . "</td>
                                <td>" . $row['Ensemble_TeamName'] . "</td>
                                <td>" . $row['Ensemble_Title'] . "</td>
                                <td>" . $row['Ensemble_Composer'] . "</td>
                                <td>" . $row['Ensemble_Arranger'] . "</td>
                                <td>" . $Ensemble_Member . "</td>
                                <td>
                                    <a href='competition_register_ensemble.php?ensembleID=" . $row['Ensemble_ID'] . "'><img src='../Asset/edit_icon.svg' width='20' style='margin-top: -7px;'></a>
                                    <button type='button' class='ensemble_del_btn' value='" . $row['Ensemble_ID'] . "'><img src='../Asset/del_icon.svg' width='20' style='margin-top: -7px;'></button>
                                </td>
                             </tr>";
                        $counter += 1;
                    }
                    ?>
                </tbody>
            </table>

            <!--orchestra table-->
            <h4 class="text-center mb-3">Orchestra</h4>
            <table class="table table-striped mb-5" id="orchestra_overview">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Orchestra Name</th>
                        <th scope="col">Song Title</th>
                        <th scope="col">Composer</th>
                        <th scope="col">Arranger</th>
                        <th scope="col">Section</th>
                        <th scope="col">Members</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rowcount = mysqli_num_rows($result_select_orchestra);
                    $counter = 1;
                    if ($rowcount == 0) {
                        echo '<tr id="list_empty_row"><th colspan="9" class="text-center">No registration</th></tr>';
                    }
                    while ($row = mysqli_fetch_assoc($result_select_orchestra)) {
//                        $json_array = $row['Orchestra_Cat'];
                        $json_array = (array) (json_decode($row['Orchestra_SectionName'], true));
                        $orchestra_section_name = "";
                        $orchestra_section_member = "";
                        $row_span = 0;
                        foreach ($json_array as $key => $value) {
                            $row_span += 1;
                        }
                        switch ($row['Orchestra_Cat']) {
                            case "cat1":
                                $Orchestra_Cat = "Elementary";
                                break;
                            case "cat2":
                                $Orchestra_Cat = "Middle-High School";
                                break;
                            case "cat3":
                                $Orchestra_Cat = "Adults";
                                break;
                            case "cat4":
                                $Orchestra_Cat = "Seniors";
                                break;
                            default:
                                $Orchestra_Cat = "Unknown";
                                break;
                        }

                        echo "<tr>
                                <td rowspan = " . $row_span . ">" . $counter . "</td>
                                <td rowspan = " . $row_span . ">" . $Orchestra_Cat . "</td>
                                <td rowspan = " . $row_span . ">" . $row['Orchestra_Name'] . "</td>
                                <td rowspan = " . $row_span . ">" . $row['Orchestra_Title'] . "</td>
                                <td rowspan = " . $row_span . ">" . $row['Orchestra_Composer'] . "</td>
                                <td rowspan = " . $row_span . ">" . $row['Orchestra_Arranger'] . "</td>";

                        $first = true;
                        foreach ($json_array as $key => $value) {
                            if ($first) {
                                $first = false;
                                echo "<td>" . $key . "</td>";
                                foreach ($value as $member) {
                                    $counter_ttl += 1;
                                    $orchestra_section_member .= $member . "<br>";
                                }
                                echo "<td>" . $orchestra_section_member . "</td>";
                                $orchestra_section_member = "";
                            }
                        }

                        echo "<td rowspan = " . $row_span . ">"
                        . "<a href='competition_register_orchestra.php?orchestraID=" . $row['Orchestra_ID'] . "'><img src='../Asset/edit_icon.svg' width='20' style='margin-top: -7px;'></a>
                                    <button type='button' class='orchestra_del_btn' value='" . $row['Orchestra_ID'] . "'><img src='../Asset/del_icon.svg' width='20' style='margin-top: -7px;'></button>
                              </td>
                             </tr>";

                        foreach (array_slice($json_array, 1) as $key => $value) {
                            echo "<tr>
                                <td>" . $key . "</td>";
                            foreach ($value as $member) {
                                $counter_ttl += 1;
                                $orchestra_section_member .= $member . "<br>";
                            }
                            echo "<td>" . $orchestra_section_member . "</td></tr>";
                            $orchestra_section_member = "";
                        }

                        $counter += 1;
                    }
                    ?>
                </tbody>
            </table>

            <!--seminar table-->
            <h4 class="text-center mt-4 mb-3">Seminar</h4>
            <table class="table table-striped mb-5" id="solo_overview">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Session</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $rowcount = mysqli_num_rows($result_select_seminar);
                    $counter = 1;
                    if ($rowcount == 0) {
                        echo '<tr id="list_empty_row"><th colspan="4" class="text-center">No registration</th></tr>';
                    }
                    while ($row = mysqli_fetch_assoc($result_select_seminar)) {
                        $counter_ttl += $row['Sem_Quantity'];
                        switch ($row['Sem_Session']) {
                            case "ses1":
                                $Sem_Session = "Cy Leo";
                                break;
                            case "ses2":
                                $Sem_Session = "Aiden N Evelyn";
                                break;
                            case "ses3":
                                $Sem_Session = "Rei Yamashita";
                                break;
                            default:
                                $Sem_Session = "Unknown";
                                break;
                        }

                        echo "<tr>
                                <td>" . $counter . "</td>
                                <td>" . $Sem_Session . "</td>
                                <td><input type='number' id='seminar_quantity' class='form-control w-25 seminar_quantity " . $row['Sem_Session'] . "' step='1' min='1' max='5' value='" . $row['Sem_Quantity'] . "'></td>
                                <td>
                                    <button type='button' class='sem_del_btn' value='" . $row['Sem_ID'] . "'><img src='../Asset/del_icon.svg' width='20'></button>
                                </td>
                             </tr>";
                        $counter += 1;
                    }
                    ?>
                </tbody>
            </table>

        </div>

        <!--blank spacing-->
        <div style="height: 50px;"></div>

        <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <p class="nav-link my-0 mr-3" style="color: white;">Total - MYR 
                        <span id="checkout_ttl">
                        <?php
                        echo $counter_ttl * 20;
                        $_SESSION['checkout_ttl'] = $counter_ttl * 20;
                        ?>
                        </span>
                    </p>
                </li>
            </ul>
            <form method="post" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL) ?>">
                <button type="submit" href="checkout.php" class="btn btn-success px-5" name="checkout_btn" id="checkout_btn" <?php echo (!$counter_ttl)? 'disabled':'enabled';?>>Check Out</button>
            </form>
            
        </nav>


    </body>

    <script>

    </script>
</html>
