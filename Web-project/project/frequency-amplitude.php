<?php

    require ('done-button.php');

if(isset($_SESSION['first'])){
    if($_SESSION['user_level'] == 2){
        require('nav-head-teacher.php');
    }
    else if($_SESSION['user_level'] == 1){
        require('nav-head-student.php');
    }
}else require('nav-head-visiter.php');

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Frequency Amplitude Understanding </title>
    <meta charset="UTF-8">
    <title>Signals and system</title>
    <!-- bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <script src="lib/p5.min.js"></script>


    <script src="frequency-amplitude-functionality.js"></script>

    <style>
        body{
            font-family: "Ink Free";
        }
        .title{
            font-size: 50px;
        }
        .left-side{
            font-size: 22px
        }
    </style>

</head>
<body>


<div class="container">

    <div class="row">
        <div class="col-sm-12"><h1>Frequency and amplitude Understanding:</h1></div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4"><h2>Frequency Understanding:</h2></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">frequency = 1x =></div>
        <div class="col-sm-9" id="canvas1" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">frequency = 2x =></div>
        <div class="col-sm-8" id="canvas2"></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">frequency = 4x =></div>
        <div class="col-sm-9" id="canvas3"></div>
    </div>
    <div class="row">
        <div class="col-sm-8 left-side">note: x is an factor which express the value of frequency</div>

    </div>
    <!-- amplitude -->
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">

    <div class="row" id="hi">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4"><h2>Amplitude Understanding:</h2></div>
    </div>

    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">amplitude = 1y =></div>
        <div class="col-sm-9" id="canvas4" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">amplitude = 0.5y =></div>
        <div class="col-sm-8" id="canvas5"></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">amplitude = 0.25y =></div>
        <div class="col-sm-9" id="canvas6"></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side"></div>
        <div class="col-sm-9" style="font-size: 18px"> <?php DoneButtClass::doneButton("freAm"); ?></div>
    </div>

</div>
<script>
    function markAsTaken(){
        alert("hi i'm here");
        document.getElementById('doneButton').innerText = "Marked as taken.";
        document.getElementById('doneButton').className = "btn btn-success btn-block";
        //you have to do a function which modifiy the data in database .
        <?php DoneButtClass::markLabAsTaken(); ?>
    }
</script>
</body>
</html>