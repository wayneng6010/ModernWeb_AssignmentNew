<?php
session_start();
include 'php/seminar_query.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Seminar Register</title>
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

        <div class="container-fluid mt-4 px-5">
            <div class="center mt-3 col-sm-6 d-block mx-auto">
                <div class="py-0">
                    <h2 class="text-center">Seminar Registration</h2>
                    <hr>
                    <form class="pt-1" name="seminar_form" method="post" onsubmit="return seminar_form_validate()" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL) ?>">
                        <div class="form-group">
                            <label for="seminar_session">Seminar Session</label>
                            <select class="form-control" name="seminar_session" id="seminar_session" required>
                                <option disabled>Choose a session</option>
                                <option value="ses1">Cy Leo</option>
                                <option value="ses2">Aiden N Evelyn</option>
                                <option value="ses3">Rei Yamashita</option>
                            </select>
                        </div>

                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/calendar_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="text" class="form-control" id="seminar_date" placeholder="Date" value="2 / 8 / 2020" readonly required>
                        </div>

                        <div class="input-group mb-3 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="../Asset/clock_icon.svg" alt="@" width="20">
                                </div>
                            </div>
                            <input type="text" class="form-control" id="seminar_time" placeholder="Time" value="11:00 AM - 11:50 AM" readonly required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="seminar_quantity" id="seminar_quantity" class="form-control" id="quantity" step="1" min="1" max="5" value="1" placeholder="Quantity">
                            <div class="error_msg" id="qty_empty"><p>Please enter quantity of ticket.</p></div>
                            <div class="error_msg" id="qty_maxQty"><p>Sorry, maximum of 5 tickets only at one time for each seminar.</p></div>
                            <div class="error_msg" id="qty_minQty"><p>Sorry, you must purchase at least 1 ticket.</p></div>
                            <div class="error_msg" id="qty_isInt"><p>Quantity should be an integer.</p></div>
                            <p class="mt-2">* Note that only <i>maximum of 5 tickets</i> can be purchased at one time for each seminar.</p>
                        </div>

                        <button type="submit" name="reg_submit" class="btn btn-success px-5 float-right btn-block">Confirm</button>

                    </form>
                </div>
            </div>
        </div>


    </body>
</html>
