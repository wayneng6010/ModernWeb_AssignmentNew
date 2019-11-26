<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About</title>
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
            <img src="../Asset/about1.jpg" class="img-fluid rounded" alt="image">
            <div class="center mt-4">
                <div class="py-0">
                    <h2>About Us</h2>
                    <hr>
                    <p class="lead text-justify">
                        A festival awaited by many harmonicists and harmonica enthusiasts from Malaysia and abroad, this 
                        year’s festival is set to feature a huge lineup of international harmonicists, allowing 
                        visitors to enjoy a wide range of performances. 
                    </p>
                    <p class="lead text-justify">
                        The <b><i>Malaysia Harmonica Festival</i></b> seeks to foster international exchanges of harmonica music by 
                        inviting harmonica performances by world-class artists and discovering new talent.
                    </p>
                    <p class="lead text-justify">
                        Since 2017, the <b><i>Malaysia Harmonica Education Association</i></b>, with the help of <b><i>Penang City Government</i></b>, 
                        generous sponsors and harmonica fans worldwide, has hosted the festival to build lasting partnerships with the local 
                        and international communities.
                    </p>
                    <hr>
                    
                    <!--hosted by-->
                    <h4>Hosted by</h4>
                    <p class="lead">
                        Malaysia Harmonica Education Association
                    </p>
                    <img src="../Asset/about2.jpg" class="img-fluid" style="width: 50%; min-width: 250px;" alt="image">
                    <hr>
                    
                    <!--benefits to participants-->
                    <h4>Benefits to participants</h4>
                    <p class="lead mb-1 text-justify">
                        Contest participants can join a free first-come, first-served basis in seminars and gala concert organized by 
                        world famous artists
                    </p>
                    <p class="lead text-justify">
                        Contest participants and spectators have access to free harmonica clinics
                    </p>
                    <br>
                </div>
            </div>
        </div>


    </body>
</html>
