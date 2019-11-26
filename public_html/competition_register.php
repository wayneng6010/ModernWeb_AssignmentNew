<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Competition</title>
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
                <img class="img-fluid rounded mb-4" src="../Asset/competition1.jpg">
                <h2 class="text-center">Competition</h2>
                <hr>
                <!--first category-->
                <div class="jumbotron px-5 py-4">
                    <h2 class="display-5">Chromatic Solo</h2>
                    <hr class="my-2">
                    <p class="lead mb-2">
                        Chromatic harmonica solo with up to 6 minutes of own choice music.
                        You may play unaccompanied or be accompanied by an instrument except another harmonica. 
                        You can bring an accompanist or provide a backing on audio CD only.
                    </p>
                    <p class="lead">
                        <a class="btn btn-primary btn px-5" href="competition_register_chromatic.php" role="button">Register</a>
                    </p>
                </div>
                <!--second category-->
                <div class="jumbotron px-5 py-4">
                    <h2 class="display-5">Ensemble</h2>
                    <hr class="my-2">
                    <p class="lead mb-2">
                        4-6 players: Any harmonicas may be used - up to 8 minutes of own choice music.
                    </p>
                    <p class="lead">
                        <a class="btn btn-primary btn px-5" href="competition_register_ensemble.php" role="button">Register</a>
                    </p>
                </div>
                <!--third category-->
                <div class="jumbotron px-5 py-4">
                    <h2 class="display-5">Orchestra</h2>
                    <hr class="my-2">
                    <p class="lead mb-2">
                        7 or more players: any harmonicas may be used - up to 10 minutes 
                        of own choice music.
                    </p>
                    <p class="lead">
                        <a class="btn btn-primary btn px-5" href="competition_register_orchestra.php" role="button">Register</a>
                    </p>
                </div>
            </div>
        </div>

        
    </body>
</html>
