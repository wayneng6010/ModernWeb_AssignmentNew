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
                <h2 class="text-center">Rules</h2>
                <hr>

                <!--first rule-->
                <h4>Performing sections and Categories</h4>
                <p><b><i>All contests will be divided into the following categories:</i></b></p>
                <ul class="list-group col-sm-8 mb-3">
                    <li class="list-group-item"><b>Elementary</b> (age of 12 and below)</li>
                    <li class="list-group-item"><b>Middle-High School</b> (age of 13~18)</li>
                    <li class="list-group-item"><b>Adults</b> (age of 19~59)</li>
                    <li class="list-group-item"><b>Senior</b> (age of 60 and above)</li>
                </ul>
                <p>
                    For <b>Orchestra</b> only, up to <i><b>10% of the team members can be of a different age group</b></i>. 
                    Contest participants are responsible for selecting the correct age category; 
                    violators will be penalized, regardless of when the violation is discovered.
                </p>

                <!--spacing-->
                <hr class="my-5">

                <!--second rule-->
                <h4>Judging Criteria</h4>
                <p><b><i>These are the evaluation criteria:</i></b></p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Criteria</th>
                            <th scope="col">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Musicality (understanding the song, musical expression)</td>
                            <td>40%</td>
                        </tr>
                        <tr>
                            <td>Playing skills (pitch, rhythm, playing, tone, rhythm)</td>
                            <td>45%</td>
                        </tr>
                        <tr>
                            <td>Difficulty of the songs</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>Stage presence</td>
                            <td>5%</td>
                        </tr>
                    </tbody>
                </table>

                <!--spacing-->
                <hr class="my-5">

                <!--second rule-->
                <h4>Awards</h4>
                <p><b><i>Select participants will be awarded the following awards:</i></b></p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 25%">Prize</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Mayor of Msia' Prize</th>
                            <td>The highest award of the tournament (only award is given).</td>
                        </tr>
                        <tr>
                            <th scope="row">Tournament Prize winner</th>
                            <td>The highest prize of the tournament. Selected from the top winners in each categories.</td>
                        </tr>
                        <tr>
                            <th scope="row">First Prize</th>
                            <td>The highest scoring participant in each category. If the First prize winner wins the 
                                Tournament Prize then the second highest scorer in that category will get First Prize.</td>
                        </tr>
                        <tr>
                            <th scope="row">Second Prize</th>
                            <td>Second highest scorer in each category.</td>
                        </tr>
                        <tr>
                            <th scope="row">Third Prize</th>
                            <td>Third highest scorer in each category.</td>
                        </tr>
                    </tbody>
                </table>
                
                <!--spacing-->
                <div class="my-5"></div>
                
            </div>
        </div>

        
    </body>
</html>
