<?php
session_start();

if(isset($_SESSION['first'])){
    if($_SESSION['user_level'] == 2){
        require('nav-head-teacher.php');
    }
    else if($_SESSION['user_level'] == 1){
        require('nav-head-student.php');
    }
}
else require('nav-head-visiter.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Labs</title>
    <!-- bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="lib/p5.min.js"></script>

    <script src="labs-functionality.js"></script>

    <style>
        .title{
            font-size: 50px;
        }
        body{
            font-family: "Ink Free";
        }
        .left-side{
            font-size: 28px
        }
        svg{
            display: none;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
    </div>

    <div class="row title">
        <div class="col-sm-4">Labs</div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="frequency-amplitude.php" target="_blank">
                    <div id="frequencyAmplitudeCanvas" style="width:100%; height:200px"></div>
                    <div class="caption">
                        <p>Frequency and Amplitude Understanding.</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="square-wave-page.php" target="_blank">
                    <div id="squareCanvas" style="width:100%; height:200px"></div>
                    <div class="caption">
                        <p>Square Wave.</p>
                    </div>
                </a>
            </div>
        </div>

            <div class="col-sm-4">
                <div class="thumbnail">
                    <a href="sawtooth-wave-page.php" target="_blank">
                        <div id="sawCanvas" style="width:100%; height:200px"></div>
                        <div class="caption">
                            <p>Sawtooth Wave.</p>
                        </div>
                    </a>
                </div>
            </div>


        </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="triangular-wave-page.php" target="_blank">
                    <div id="triCanvas" style="width:100%; height:200px"></div>
                    <div class="caption">
                        <p>Triangular Wave.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>


</div>


</body>
</html>

</body>
</html>