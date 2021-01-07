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
    <title>Square Wave</title>
    <!-- bootstrap -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <!-- math lib-->

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <script src="square-wave-functionality.js"></script>

    <script src="lib/p5.min.js"></script>

    <script src="lib/sine-wave.js"></script>

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
<body onload="let intervalId = setInterval(wavesAnimation,2000)">
    <div class="container">

        <div class="row">
            <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->   
        </div>
    
        <div class="row">
            <div class="col-sm-10  title">Generate square wave using fourier series</div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
            <p style="font-size: 30px; ">
                <math xmlns="http://www.w3.org/1998/Math/MathML"><munderover><mo>&#x2211;</mo><mrow><mi>n</mi><mo>=</mo><mn>odd</mn></mrow><mo>&#x221E;</mo></munderover><mfenced><mfrac><mn>4</mn><mrow><mi>n</mi><mi>&#x3C0;</mi></mrow></mfrac></mfenced><mi>sin</mi><mfenced><mfrac><mrow><mi>n</mi><mi>&#x3C0;</mi><mi>&#x3C0;</mi></mrow><mi>L</mi></mfrac></mfenced></math>
            </p>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row">

            <div class="col-sm-8" style="font-size: 24px">Note that: n affects on the <a href="frequency-amplitude.php" target="_blank">frequency and the amplitude</a> of the wave.</div>
        </div>

        <div class="row" >
            <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->

            <div class="col-sm-3">      <!-- left side of page -->

                <div class="container left-side">
                    <div class="row">
                        <div class="col-sm-1" >sin(1πx)/1π</div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">-->> n=1</div>
                        <div class="col-sm-1"></div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->


                    </div>

                    <div class="row">
                        <div class="col-sm-1">sin(3πx)/3π</div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">-->> n=3</div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                    </div>

                    <div class="row">
                        <div class="col-sm-1">sin(5πx)/5π</div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">-->> n=5</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                    </div>

                    <div class="row">
                        <div class="col-sm-3">Sum of the waves above:</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                    </div>
                    <div class="row">
                        <div class="col-sm-3">from n = 1 to n = <span id="sliderValue">5</span></div>
                    </div>


                </div>
            </div>
            <div class="col-sm-9" id="squareWave" style=" height: 1050px; " ></div>

        </div>

        <div class="row" style="font-size: 24px">
            <div class="col-sm-3"></div>
            <div class="col-sm-4">Change number of n's by this slider:</div>
            <div class="col-sm-5" id="sliderDiv"></div>
        </div>

        <div class="row" style="font-size: 24px">
            <div class="col-sm-3"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-5"></div>
        </div>
        <div class="row">
            <div class="col-sm-3 left-side"></div>
            <div class="col-sm-9 "  style="font-size: 18px" ><?php  DoneButtClass::doneButton("sq000"); ?></div>
        </div>


    </div>


    <div class="container-fluid">

        <div id="wavePosition"></div>

    </div>



    <svg  id="wave-1" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,192L0,32L53.3,32L53.3,128L106.7,128L106.7,320L160,320L160,0L213.3,0L213.3,96L266.7,96L266.7,64L320,64L320,160L373.3,160L373.3,128L426.7,128L426.7,256L480,256L480,128L533.3,128L533.3,0L586.7,0L586.7,32L640,32L640,192L693.3,192L693.3,64L746.7,64L746.7,128L800,128L800,96L853.3,96L853.3,224L906.7,224L906.7,128L960,128L960,320L1013.3,320L1013.3,192L1066.7,192L1066.7,96L1120,96L1120,256L1173.3,256L1173.3,32L1226.7,32L1226.7,192L1280,192L1280,288L1333.3,288L1333.3,128L1386.7,128L1386.7,160L1440,160L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-2" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,256L0,96L53.3,96L53.3,192L106.7,192L106.7,160L160,160L160,256L213.3,256L213.3,224L266.7,224L266.7,224L320,224L320,160L373.3,160L373.3,64L426.7,64L426.7,128L480,128L480,288L533.3,288L533.3,288L586.7,288L586.7,224L640,224L640,64L693.3,64L693.3,192L746.7,192L746.7,288L800,288L800,128L853.3,128L853.3,128L906.7,128L906.7,128L960,128L960,256L1013.3,256L1013.3,224L1066.7,224L1066.7,160L1120,160L1120,32L1173.3,32L1173.3,32L1226.7,32L1226.7,288L1280,288L1280,0L1333.3,0L1333.3,288L1386.7,288L1386.7,288L1440,288L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-3" name="wave"  viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,32L0,256L53.3,256L53.3,64L106.7,64L106.7,32L160,32L160,224L213.3,224L213.3,224L266.7,224L266.7,32L320,32L320,96L373.3,96L373.3,64L426.7,64L426.7,320L480,320L480,64L533.3,64L533.3,224L586.7,224L586.7,32L640,32L640,96L693.3,96L693.3,64L746.7,64L746.7,32L800,32L800,128L853.3,128L853.3,0L906.7,0L906.7,192L960,192L960,128L1013.3,128L1013.3,32L1066.7,32L1066.7,288L1120,288L1120,224L1173.3,224L1173.3,224L1226.7,224L1226.7,128L1280,128L1280,32L1333.3,32L1333.3,32L1386.7,32L1386.7,288L1440,288L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-4" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,288L0,128L53.3,128L53.3,224L106.7,224L106.7,128L160,128L160,96L213.3,96L213.3,192L266.7,192L266.7,96L320,96L320,128L373.3,128L373.3,32L426.7,32L426.7,224L480,224L480,224L533.3,224L533.3,256L586.7,256L586.7,128L640,128L640,128L693.3,128L693.3,224L746.7,224L746.7,96L800,96L800,224L853.3,224L853.3,288L906.7,288L906.7,32L960,32L960,32L1013.3,32L1013.3,0L1066.7,0L1066.7,96L1120,96L1120,288L1173.3,288L1173.3,256L1226.7,256L1226.7,224L1280,224L1280,96L1333.3,96L1333.3,288L1386.7,288L1386.7,160L1440,160L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-5" name="wave"  viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,0L0,288L53.3,288L53.3,288L106.7,288L106.7,96L160,96L160,224L213.3,224L213.3,288L266.7,288L266.7,160L320,160L320,64L373.3,64L373.3,160L426.7,160L426.7,64L480,64L480,320L533.3,320L533.3,192L586.7,192L586.7,160L640,160L640,256L693.3,256L693.3,288L746.7,288L746.7,32L800,32L800,96L853.3,96L853.3,288L906.7,288L906.7,96L960,96L960,32L1013.3,32L1013.3,256L1066.7,256L1066.7,256L1120,256L1120,320L1173.3,320L1173.3,32L1226.7,32L1226.7,96L1280,96L1280,128L1333.3,128L1333.3,64L1386.7,64L1386.7,192L1440,192L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-6" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,192L0,288L53.3,288L53.3,256L106.7,256L106.7,128L160,128L160,288L213.3,288L213.3,224L266.7,224L266.7,160L320,160L320,224L373.3,224L373.3,192L426.7,192L426.7,256L480,256L480,160L533.3,160L533.3,32L586.7,32L586.7,256L640,256L640,288L693.3,288L693.3,160L746.7,160L746.7,128L800,128L800,288L853.3,288L853.3,192L906.7,192L906.7,160L960,160L960,160L1013.3,160L1013.3,256L1066.7,256L1066.7,288L1120,288L1120,160L1173.3,160L1173.3,0L1226.7,0L1226.7,224L1280,224L1280,320L1333.3,320L1333.3,288L1386.7,288L1386.7,288L1440,288L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-7" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,160L0,96L53.3,96L53.3,256L106.7,256L106.7,64L160,64L160,32L213.3,32L213.3,128L266.7,128L266.7,224L320,224L320,128L373.3,128L373.3,96L426.7,96L426.7,224L480,224L480,128L533.3,128L533.3,32L586.7,32L586.7,192L640,192L640,32L693.3,32L693.3,320L746.7,320L746.7,32L800,32L800,160L853.3,160L853.3,320L906.7,320L906.7,64L960,64L960,320L1013.3,320L1013.3,64L1066.7,64L1066.7,96L1120,96L1120,96L1173.3,96L1173.3,32L1226.7,32L1226.7,32L1280,32L1280,192L1333.3,192L1333.3,288L1386.7,288L1386.7,0L1440,0L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-8" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,224L0,256L53.3,256L53.3,96L106.7,96L106.7,288L160,288L160,224L213.3,224L213.3,224L266.7,224L266.7,320L320,320L320,128L373.3,128L373.3,0L426.7,0L426.7,160L480,160L480,96L533.3,96L533.3,64L586.7,64L586.7,192L640,192L640,64L693.3,64L693.3,160L746.7,160L746.7,192L800,192L800,192L853.3,192L853.3,192L906.7,192L906.7,288L960,288L960,160L1013.3,160L1013.3,96L1066.7,96L1066.7,32L1120,32L1120,192L1173.3,192L1173.3,64L1226.7,64L1226.7,0L1280,0L1280,288L1333.3,288L1333.3,96L1386.7,96L1386.7,96L1440,96L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-9" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,96L0,32L53.3,32L53.3,96L106.7,96L106.7,160L160,160L160,192L213.3,192L213.3,64L266.7,64L266.7,224L320,224L320,32L373.3,32L373.3,288L426.7,288L426.7,256L480,256L480,128L533.3,128L533.3,288L586.7,288L586.7,224L640,224L640,288L693.3,288L693.3,64L746.7,64L746.7,32L800,32L800,64L853.3,64L853.3,256L906.7,256L906.7,32L960,32L960,192L1013.3,192L1013.3,224L1066.7,224L1066.7,128L1120,128L1120,64L1173.3,64L1173.3,160L1226.7,160L1226.7,32L1280,32L1280,160L1333.3,160L1333.3,64L1386.7,64L1386.7,288L1440,288L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>

    <svg id="wave-10" name="wave" viewBox="0 0 1440 320"><path fill="#5FA8D3" fill-opacity="1" d="M0,64L0,320L53.3,320L53.3,64L106.7,64L106.7,288L160,288L160,32L213.3,32L213.3,32L266.7,32L266.7,224L320,224L320,192L373.3,192L373.3,224L426.7,224L426.7,160L480,160L480,320L533.3,320L533.3,288L586.7,288L586.7,256L640,256L640,224L693.3,224L693.3,32L746.7,32L746.7,32L800,32L800,128L853.3,128L853.3,224L906.7,224L906.7,64L960,64L960,64L1013.3,64L1013.3,192L1066.7,192L1066.7,224L1120,224L1120,256L1173.3,256L1173.3,288L1226.7,288L1226.7,32L1280,32L1280,320L1333.3,320L1333.3,320L1386.7,320L1386.7,288L1440,288L1440,320L1386.7,320L1386.7,320L1333.3,320L1333.3,320L1280,320L1280,320L1226.7,320L1226.7,320L1173.3,320L1173.3,320L1120,320L1120,320L1066.7,320L1066.7,320L1013.3,320L1013.3,320L960,320L960,320L906.7,320L906.7,320L853.3,320L853.3,320L800,320L800,320L746.7,320L746.7,320L693.3,320L693.3,320L640,320L640,320L586.7,320L586.7,320L533.3,320L533.3,320L480,320L480,320L426.7,320L426.7,320L373.3,320L373.3,320L320,320L320,320L266.7,320L266.7,320L213.3,320L213.3,320L160,320L160,320L106.7,320L106.7,320L53.3,320L53.3,320L0,320L0,320Z"></path></svg>
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