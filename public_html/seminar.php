<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Seminar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../Asset/tab_icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="javascript.js"></script>

        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="javascript.js"></script>-->

    </head>
    <body>
        <?php include 'navbar.php'; ?>

        <!--height spacing-->
        <div class="height_spacing"></div>

        <div class="artist_outer">
            <div class="artist_content first">
                <p class="artist_content_name">CY Leo</p>
                <p class="artist_content_description">Hong Kong’s youngest world champion harmonica player on a mission to ‘rebrand’ his humble instrument</p>
                <p class="artist_content_dateTime">August 2, 2020 &#64; 11:00 - 11:50</p>
                <a href="seminar_register.php"><p class="artist_register_btn">Register Now</p></a>
            </div>
            <div class="artist_img_portrait first"></div>
            <div class="artist_img_bg first"></div>
        </div>

        <div class="artist_outer">
            <div class="artist_content second">
                <p class="artist_content_name">Aiden N Evelyn</p>
                <p class="artist_content_description">One of the Malaysia’s most recognizable celebrities in harmonica industry as well as international.</p>
                <p class="artist_content_dateTime">August 2, 2020 &#64; 12:00 - 12:50</p>
                <a href="seminar_register.php"><p class="artist_register_btn">Register Now</p></a>
            </div>
            <div class="artist_img_portrait second"></div>
            <div class="artist_img_bg second"></div>
        </div>

        <div class="artist_outer">
            <div class="artist_content third">
                <p class="artist_content_name">Rei Yamashita</p>
                <p class="artist_content_description">Professional harmonica player and instructor based in Tokyo and Yokohama area.</p>
                <p class="artist_content_dateTime">August 2, 2020 &#64; 13:00 - 13:50</p>
                <a href="seminar_register.php"><p class="artist_register_btn">Register Now</p></a>
            </div>
            <div class="artist_img_portrait third"></div>
            <div class="artist_img_bg third"></div>
        </div>

        
    </body>
</html>