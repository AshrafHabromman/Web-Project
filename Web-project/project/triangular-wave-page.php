<?php

require ("done-button.php");

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
    <meta charset="UTF-8">
    <title>Triangular Wave</title>

    <meta charset="UTF-8">
    <title>Signals and system</title>
    <!-- bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <script src="lib/p5.min.js"></script>

    <script src="triangular-wave-functionality.js"></script>

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

    <div class="row">
        <div class="col-sm-12  title">Generate triangular wave using fourier series</div>
    </div>

    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"></pre></div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <p style="font-size: 30px;">
                <math xmlns="http://www.w3.org/1998/Math/MathML"><mstyle displaystyle="false"><munderover><mo>&#x2211;</mo><mrow><mi>o</mi><mi>d</mi><mi>d</mi></mrow><mo>&#x221E;</mo></munderover></mstyle><mfenced><mrow><mfrac><mn>8</mn><msup><mi>&#x3C0;</mi><mn>2</mn></msup></mfrac><mfrac><msup><mfenced><mrow><mo>-</mo><mn>1</mn></mrow></mfenced><mstyle displaystyle="true"><mfrac><mrow><mi>n</mi><mo>-</mo><mn>1</mn></mrow><mn>2</mn></mfrac></mstyle></msup><msup><mi>n</mi><mn>2</mn></msup></mfrac><mi>sin</mi><mfenced><mfrac><mi>n&#x3C0;x</mi><mi mathvariant="normal">L</mi></mfrac></mfenced></mrow></mfenced></math>        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">for n = 1</div>
        <div class="col-sm-9" id="canvas1" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">from n = 1 to n=3</div>
        <div class="col-sm-9" id="canvas2" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">from n = 1 to n = 5</div>
        <div class="col-sm-9" id="canvas3" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">from n = 1 to n = 7</div>
        <div class="col-sm-9" id="canvas4" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">from n = 1 to n = <span id="sliderValue">7</span></div>
        <div class="col-sm-9" id="canvas5" ></div>
    </div>

    <div class="row" style="font-size: 24px">
        <div class="col-sm-3"></div>
        <div class="col-sm-4">Change number of n's by this slider:</div>
        <div class="col-sm-5" id="sliderDiv"></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side"></div>
        <div class="col-sm-9 "  style="font-size: 18px" ><?php   DoneButtClass::doneButton("tri22");?></div>
    </div>
</div>
<script>
    function markAsTaken(){

        document.getElementById('doneButton').innerText = "Marked as taken.";
        document.getElementById('doneButton').className = "btn btn-success btn-block";
        //you have to do a function which modifiy the data in database .
        <?php DoneButtClass::markLabAsTaken(); ?>
    }
</script>

</body>
</html>