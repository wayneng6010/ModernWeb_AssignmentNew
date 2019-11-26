<?php
    $link = mysqli_connect('localhost', 'root', '', 'competition_register');
    if (!$link) {
        die('connection Error') . mysqli_connect_error();
    }
?>