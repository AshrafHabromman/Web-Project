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
    <meta charset="UTF-8">
    <title>Sawtooth Wave</title>
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
    <script src="sawtooth-wave-functionality.js"></script>

    <script src="lib/waves-animation.js"></script>

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
<body onload="intervalId=setInterval(wavesAnimation,2000)">

<div class="container">

    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
    </div>

    <div class="row">
        <div class="col-sm-12  title">Generate sawtooth wave using fourier series</div>
    </div>

    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <p style="font-size: 30px; ">
                <math xmlns="http://www.w3.org/1998/Math/MathML"><mfrac><mn>1</mn><mn>2</mn></mfrac><mo>-</mo><munderover><mo>&#x2211;</mo><mrow><mi>n</mi><mo>=</mo><mn>1</mn></mrow><mo>&#x221E;</mo></munderover><mfenced><mfrac><mn>1</mn><mrow><mi>n</mi><mi>&#x3C0;</mi></mrow></mfrac></mfenced><mi>sin</mi><mfenced><mfrac><mrow><mi>n</mi><mi>&#x3C0;</mi><mi>x</mi></mrow><mi>L</mi></mfrac></mfenced></math>            </p>
        </div>
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
        <div class="col-sm-3 left-side">from n = 1 to n=2</div>
        <div class="col-sm-9" id="canvas2" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">from n = 1 to n = 3</div>
        <div class="col-sm-9" id="canvas3" ></div>
    </div>

    <div class="row">
        <div class="col-sm-3 left-side">from n = 1 to n = 4</div>
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
        <div class="col-sm-9 "  style="font-size: 18px" ><?php  DoneButtClass::doneButton("saw11"); ?></div>
    </div>
</div>

<div class="container-fluid">
    <div id="wavePosition"></div>
</div>

<svg  id="wave-1" name="wave"  viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,192L45,32L90,192L135,160L180,0L225,224L270,160L315,192L360,224L405,288L450,64L495,288L540,96L585,288L630,224L675,96L720,128L765,320L810,32L855,224L900,160L945,288L990,192L1035,256L1080,224L1125,288L1170,64L1215,128L1260,32L1305,32L1350,224L1395,64L1440,64L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg  id="wave-2" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,192L45,256L90,256L135,288L180,128L225,320L270,192L315,256L360,0L405,224L450,288L495,32L540,128L585,320L630,256L675,256L720,0L765,224L810,192L855,224L900,192L945,192L990,256L1035,256L1080,32L1125,64L1170,0L1215,32L1260,192L1305,160L1350,128L1395,192L1440,288L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg  id="wave-3" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,288L45,192L90,128L135,192L180,128L225,64L270,128L315,128L360,64L405,288L450,96L495,320L540,160L585,96L630,256L675,128L720,288L765,128L810,224L855,160L900,128L945,32L990,0L1035,0L1080,160L1125,32L1170,256L1215,288L1260,256L1305,160L1350,64L1395,288L1440,288L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg id="wave-4" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,128L45,32L90,192L135,320L180,96L225,32L270,64L315,96L360,96L405,128L450,128L495,128L540,192L585,0L630,320L675,160L720,160L765,0L810,160L855,256L900,128L945,320L990,256L1035,128L1080,256L1125,192L1170,256L1215,256L1260,224L1305,256L1350,320L1395,128L1440,128L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg id="wave-5" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,128L45,160L90,64L135,128L180,96L225,32L270,64L315,160L360,160L405,128L450,32L495,64L540,256L585,64L630,128L675,96L720,288L765,320L810,160L855,160L900,224L945,96L990,96L1035,192L1080,160L1125,256L1170,192L1215,64L1260,96L1305,32L1350,320L1395,0L1440,192L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg id="wave-6" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,96L45,192L90,32L135,128L180,192L225,256L270,32L315,96L360,224L405,96L450,224L495,192L540,0L585,192L630,128L675,128L720,192L765,64L810,96L855,64L900,32L945,0L990,256L1035,32L1080,128L1125,160L1170,96L1215,192L1260,128L1305,32L1350,192L1395,160L1440,96L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg id="wave-7" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,128L45,224L90,32L135,192L180,192L225,288L270,288L315,288L360,288L405,256L450,288L495,256L540,32L585,192L630,128L675,256L720,64L765,96L810,128L855,64L900,32L945,192L990,128L1035,288L1080,288L1125,32L1170,128L1215,192L1260,64L1305,128L1350,0L1395,64L1440,160L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg id="wave-8" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,192L45,128L90,192L135,64L180,256L225,224L270,96L315,32L360,64L405,32L450,64L495,256L540,320L585,192L630,288L675,192L720,160L765,128L810,160L855,320L900,256L945,288L990,128L1035,288L1080,224L1125,160L1170,128L1215,32L1260,288L1305,128L1350,96L1395,192L1440,32L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg id="wave-9" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,224L45,96L90,224L135,256L180,32L225,288L270,160L315,32L360,224L405,288L450,96L495,96L540,256L585,256L630,0L675,0L720,0L765,0L810,32L855,0L900,32L945,256L990,32L1035,128L1080,96L1125,256L1170,128L1215,192L1260,224L1305,0L1350,224L1395,288L1440,128L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>

<svg id="wave-10" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,32L45,256L90,224L135,192L180,256L225,96L270,256L315,288L360,192L405,320L450,288L495,288L540,256L585,64L630,128L675,128L720,288L765,256L810,160L855,128L900,224L945,96L990,160L1035,128L1080,32L1125,256L1170,32L1215,192L1260,288L1305,192L1350,288L1395,64L1440,32L1440,320L1395,320L1350,320L1305,320L1260,320L1215,320L1170,320L1125,320L1080,320L1035,320L990,320L945,320L900,320L855,320L810,320L765,320L720,320L675,320L630,320L585,320L540,320L495,320L450,320L405,320L360,320L315,320L270,320L225,320L180,320L135,320L90,320L45,320L0,320Z"></path></svg>
<script>
    function markAsTaken(){

        document.getElementById('doneButton').innerText = "Marked as taken.";
        document.getElementById('doneButton').className = "btn btn-success btn-block";
        //you have to do a function which modifiy the data in database .
        <?php  DoneButtClass::markLabAsTaken(); ?>
    }
</script>
</body>
</html>