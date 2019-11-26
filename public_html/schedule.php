<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Schedule</title>
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
        <div class="container-fluid mt-4 px-5">
            <div class="py-0">
                <h2 class="text-center">Schedule and Location</h2>
                <hr>
                <div class="container px-0 pt-2">
                    <div class="row">
                        <img src="../Asset/schedule1.png" class="img-fluid rounded col-sm-6 mb-4" alt="image" width="600">
                        <img src="../Asset/schedule2.png" class="img-fluid rounded col-sm-6 mb-3" alt="image" width="600">
                    </div>
                    <div class="row justify-content-center">
                        <img src="../Asset/schedule3.png" class="img-fluid rounded" alt="image" width="600">
                    </div>
                </div>
                <hr class="my-5">
                <h4 class="mb-3 text-center">Damansara Performing Arts Centre</h4>
                <iframe class="w-100 mb-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.722356873739!2d101.60997151380877!3d3.1676526976935517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4f34b5f5d563%3A0xb83c97088d2fc9f8!2sDamansara%20Performing%20Arts%20Centre!5e0!3m2!1sen!2smy!4v1569687684375!5m2!1sen!2smy" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>


    </body>
</html>
