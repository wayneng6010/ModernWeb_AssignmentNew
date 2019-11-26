<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
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
        <!--first row jumbotron header-->
        <div class="container-fluid">
            <header id="home_jumbotron" class="jumbotron mt-4 mb-1 p-5 shadow">
                <h1 class="display-4 text-light" style="text-shadow: 0px 1px 4px #000000;">Malaysia Harmonica Festival 2019</h1>
                <p class="lead text-light" style="text-shadow: 0px 1px 4px #000000;">One of the most happening harmonica events in Malaysia! Welcome all the harmonica lovers to join us.</p>
                <a href="competition_register.php" class="btn btn-success btn-lg px-5">Register Now</a>
            </header>
        </div>

        <!--second row card-->
        <div class="row p-3">
            <div class="col-md-4 mb-2">
                <a href="schedule.php">
                    <div class="card h-100 shadow-sm home">
                        <img class="card-img-top" src="../Asset/dpac_card.jpg" alt="">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-3 text-primary">Schedule and Location</h5>
                            <p class="card-text text-secondary">Venue and schedule for each competition and seminar.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="competition_register.php">
                    <div class="card h-100 shadow-sm home">
                        <img class="card-img-top" src="../Asset/competition_card.jpg" alt="">
                        <div class="card-body" style="height: 141px;">
                            <h5 class="card-title border-bottom pb-3 text-primary">Competition</h5>
                            <p class="card-text text-secondary">Application Deadline: 2/7/2020</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="seminar.php">
                    <div class="card h-100 shadow-sm home">
                        <img class="card-img-top" src="../Asset/seminar_card.jpg" alt="">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-3 text-primary">Seminar</h5>
                            <p class="card-text text-secondary">Attend master class lead by various world leading harmonica players.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        
    </body>
</html>
