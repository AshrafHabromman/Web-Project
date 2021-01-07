<?php
session_start();
require ('nav-head-visiter.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signals and Systems</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        let wavenumber = 1;

        function wavesAnimation(){

            let waveName = "wave-"+wavenumber.toString();

            let wavePositionElement = document.getElementById('wavePosition');

            let allWaves = document.getElementsByName("wave");
            console.log(allWaves.length+ waveName);

            for(let i=0 ;i<allWaves.length; i++)
            {

                allWaves[i].style.display = "none";
            }

            document.getElementById(waveName).style.display = "block";
            wavePositionElement.innerHTML = document.getElementById(waveName).innerHTML;
            wavenumber++;
            if(wavenumber==allWaves.length){
                wavenumber = 1;
            }
        }
    </script>
    <style>
        body{
            font-family: "Ink Free";
        }
        .input-group-addon{
            color: white;
            background-color:#5FA8D3 ;
        }
        svg{
            display: none;
        }
    </style>
    <script type="text/javascript">
        function  showfun(x,y){
            let field = document.getElementById(x);
            if(y.className=='glyphicon glyphicon-eye-close'){
                field.type ="text";
                y.className ="glyphicon glyphicon-eye-open";
            }
            else {
                field.type ="password";
                y.className ="glyphicon glyphicon-eye-close";
            }
        }
        function f_change (show,hide){
            let x = document.getElementById(show);
            x.className="active";
            let y= document.getElementById(hide);
            y.className="";
        }
        function setPane(){
            f_change('li2','li1');
            document.getElementById('login_in').className='tab-pane fade in active';
            document.getElementById('sign_up').className='tab-pane fade';
        }

    </script>

</head>
<body onload="intervalId=setInterval(wavesAnimation,2000)">
<ul class="nav nav-tabs" >
    <li class="active" id="li1">
        <a data-toggle="tab" href="#sign_up"> Sign up </a>
    </li>
    <li id="li2">
        <a data-toggle="tab" href="#login_in"> Log in </a>
    </li>
</ul>
<div class="tab-content">
    <div id="login_in" class="tab-pane fade">
        <div class="container">
            <h3>Log in</h3>
            <h3 id="ress"></h3>
            <form class="form-horizontal" method="post" action="Login_signin.php">
                <div class="form-group">
                    <label for="u_email" class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                            <input type="email" name="u_email" autocomplete="on" id="u_email" class="form-control" placeholder="Enter email" required>
                        </div></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="u_password">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-eye-close" onclick="showfun('u_password',this);"></span>
                            </div>
                            <input type="password" autocomplete="on" name="u_password" id="u_password" class="form-control" placeholder="Enter password" required>
                        </div></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Log in" class="btn btn-default">
                    </div>
                </div>
                <a href="#sign_up" data-toggle="tab" onclick="f_change('li1','li2')"> Don't have an account? click here</a>
            </form>
        </div>
    </div>
    <div id="sign_up"  class="tab-pane fade in active">
        <div class="container">
            <h3>Sign up</h3>
            <form class="form-horizontal" action="insert_user.php" method="post">
                <div class="form-group">

                    <label class="control-label col-sm-2" for="nu_fname">First Name</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <input autocomplete="on" class="form-control" type="text" id="nu_fname" name="nu_fname" placeholder="Enter first name" required>
                        </div> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nu_lname">Last Name</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <input autocomplete="on" class="form-control" type="text" id="nu_lname" name="nu_lname" placeholder="Enter your last name" required>
                        </div> </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nu_email">Email</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                            <input autocomplete="on" class="form-control" type="email" id="nu_email" name="nu_email" placeholder="Enter Email" required>
                        </div></div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"  for="nu_pass">Password</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-eye-close" onclick="showfun('nu_pass',this);"></span>
                            </div>
                            <input class="form-control" type="password" id="nu_pass" name="nu_pass" placeholder="Enter password" required>
                        </div></div>
                </div>
                <div class="radio col-sm-offset-2 col-sm-10">
                    <label><input type="radio" name="nu_ul" value="1" checked>Student</label>
                </div>
                <div class="radio col-sm-offset-2 col-sm-10">
                    <label><input type="radio" value="2" name="nu_ul">Teacher</label>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="wavePosition">
</div>
<svg id="wave-1" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1"
                                                          d="M0,160L8.3,149.3C16.6,139,
    33,117,50,117.3C66.2,117,83,139,99,149.3C115.9,160,132,160,149,
    186.7C165.5,213,182,267,199,288C215.2,309,232,299,248,261.3C264.8,
    224,281,160,298,160C314.5,160,331,224,348,240C364.1,256,381,224,
    397,218.7C413.8,213,430,235,447,240C463.4,245,480,235,497,208C513.1,
    181,530,139,546,149.3C562.8,160,579,224,596,234.7C612.4,245,629,203,
    646,160C662.1,117,679,75,695,90.7C711.7,107,728,181,745,229.3C761.4,277,778,
    299,794,293.3C811,288,828,256,844,208C860.7,160,877,96,894,74.7C910.3,53,927
    ,75,943,90.7C960,107,977,117,993,128C1009.7,139,1026,149,1043,149.3C1059.3,149
    ,1076,139,1092,138.7C1109,139,1126,149,1142,138.7C1158.6,128,1175,96,1192,101.3C1208.3,
    107,1225,149,1241,186.7C1257.9,224,1274,256,1291,266.7C1307.6,277,1324,267,1341,
    250.7C1357.2,235,1374,213,1390,202.7C1406.9,192,1423,192,1432,192L1440,192L1440,
    320L1431.7,320C1423.4,320,1407,320,1390,320C1373.8,320,1357,320,1341,320C1324.1,320,1308,320,
    1291,320C1274.5,320,1258,320,1241,320C1224.8,320,1208,320,1192,320C1175.2,320,1159,320,1142,
    320C1125.5,320,1109,320,1092,320C1075.9,320,1059,320,1043,320C1026.2,320,1010,320,993,320C976.6,320
    ,960,320,943,320C926.9,320,910,320,894,320C877.2,320,861,320,844,320C827.6,320,811,320,794,320C777.9
    ,320,761,320,745,320C728.3,320,712,320,695,320C678.6,320,662,320,646,320C629,320,612,320,596,320C579.3
    ,320,563,320,546,320C529.7,320,513,320,497,320C480,320,463,320,447,320C430.3,320,414,320,397,320C380.7,
    320,364,320,348,320C331,320,314,320,298,320C281.4,320,265,320,248,320C231.7,320,215,320,199,320C182.1,
    320,166,320,149,320C132.4,320,116,320,99,320C82.8,320,66,320,50,320C33.1,320,17,320,8,320L0,
    320Z"></path></svg>
<svg id="wave-2" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3"
                                                          fill-opacity="1" d="M0,64L8.3,101.3C16.6,139,33,213,50,208C66.2,203,83,117,99,
         106.7C115.9,96,132,160,149,181.3C165.5,203,182,181,199,170.7C215.2,160,232,160,
         248,160C264.8,160,281,160,298,149.3C314.5,139,331,117,348,138.7C364.1,160,381,
         224,397,218.7C413.8,213,430,139,447,117.3C463.4,96,480,128,497,133.3C513.1,139,
         530,117,546,101.3C562.8,85,579,75,596,74.7C612.4,75,629,85,646,90.7C662.1,96,679
         ,96,695,112C711.7,128,728,160,745,165.3C761.4,171,778,149,794,165.3C811,181,828,
         235,844,256C860.7,277,877,267,894,266.7C910.3,267,927,277,943,266.7C960,256,977,
         224,993,192C1009.7,160,1026,128,1043,138.7C1059.3,149,1076,203,1092,208C1109,213,
         1126,171,1142,149.3C1158.6,128,1175,128,1192,149.3C1208.3,171,1225,213,1241
         ,202.7C1257.9,192,1274,128,1291,117.3C1307.6,107,1324,149,1341,149.3C1357.2,149,
         1374,107,1390,112C1406.9,117,1423,171,1432,197.3L1440,224L1440,320L1431.7,320C1423.4
         ,320,1407,320,1390,320C1373.8,320,1357,320,1341,320C1324.1,320,1308,320,1291,320C1274.5
         ,320,1258,320,1241,320C1224.8,320,1208,320,1192,320C1175.2,320,1159,320,1142,320C1125.5,320
         ,1109,320,1092,320C1075.9,320,1059,320,1043,320C1026.2,320,1010,320,993,320C976.6,320,960,
         320,943,320C926.9,320,910,320,894,320C877.2,320,861,320,844,320C827.6,320,811,320,794,
         320C777.9,320,761,320,745,320C728.3,320,712,320,695,320C678.6,320,662,320,646,320C629,320,
         612,320,596,320C579.3,320,563,320,546,320C529.7,320,513,320,497,320C480,320,463,320,447,
         320C430.3,320,414,320,397,320C380.7,320,364,320,348,320C331,320,314,320,298,320C281.4,320,
         265,320,248,320C231.7,320,215,320,199,320C182.1,320,166,320,149,320C132.4,320,116,320,99,
         320C82.8,320,66,320,50,320C33.1,320,17,320,8,320L0,320Z"></path></svg>
<svg id="wave-3" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,192L8,
            170.7C16,149,32,107,48,117.3C64,128,80,192,96,181.3C112,171,128,85,144,69.3C160,53,176,
            107,192,106.7C208,107,224,53,240,58.7C256,64,272,128,288,128C304,128,320,64,336,80C352,
            96,368,192,384,234.7C400,277,416,267,432,224C448,181,464,107,480,69.3C496,32,512,32,528,
            69.3C544,107,560,181,576,181.3C592,181,608,107,624,106.7C640,107,656,181,672,181.3C688,181,
            704,107,720,74.7C736,43,752,53,768,53.3C784,53,800,43,816,74.7C832,107,848,181,864,224C880,
            267,896,277,912,266.7C928,256,944,224,960,218.7C976,213,992,235,1008,250.7C1024,267,1040,277,
            1056,288C1072,299,1088,309,1104,288C1120,267,1136,213,1152,170.7C1168,128,1184,96,1200,117.3C1216,
            139,1232,213,1248,234.7C1264,256,1280,224,1296,176C1312,128,1328,64,1344,58.7C1360,53,1376,107,1392,
            112C1408,117,1424,75,1432,53.3L1440,32L1440,320L1432,320C1424,320,1408,320,1392,320C1376,320,1360,
            320,1344,320C1328,320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,320,1216,320,1200,320C1184,
            320,1168,320,1152,320C1136,320,1120,320,1104,320C1088,320,1072,320,1056,320C1040,320,1024,320,1008,
            320C992,320,976,320,960,320C944,320,928,320,912,320C896,320,880,320,864,320C848,320,832,320,816,
            320C800,320,784,320,768,320C752,320,736,320,720,320C704,320,688,320,672,320C656,320,640,320,624,320C608
            ,320,592,320,576,320C560,320,544,320,528,320C512,320,496,320,480,320C464,320,448,320,432,320C416,320,400,
            320,384,320C368,320,352,320,336,320C320,320,304,320,288,320C272,320,256,320,240,320C224,320,208,320,192,
            320C176,320,160,320,144,320C128,320,112,320,96,320C80,320,64,320,48,320C32,320,16,320,8,320L0,
            320Z"></path></svg>
<svg id="wave-4" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,
    96L8,122.7C16,149,32,203,48,192C64,181,80,107,96,69.3C112,32,128,32,144,64C160,96,176,160,192,165.3C208,
    171,224,117,240,106.7C256,96,272,128,288,149.3C304,171,320,181,336,181.3C352,181,368,171,384,149.3C400,
    128,416,96,432,122.7C448,149,464,235,480,245.3C496,256,512,192,528,149.3C544,107,560,85,576,69.3C592,53,
    608,43,624,69.3C640,96,656,160,672,176C688,192,704,160,720,128C736,96,752,64,768,90.7C784,117,800,203,816
    ,218.7C832,235,848,181,864,138.7C880,96,896,64,912,85.3C928,107,944,181,960,181.3C976,181,992,107,1008,
    90.7C1024,75,1040,117,1056,133.3C1072,149,1088,139,1104,112C1120,85,1136,43,1152,37.3C1168,32,1184,64,1200,
    96C1216,128,1232,160,1248,186.7C1264,213,1280,235,1296,218.7C1312,203,1328,149,1344,144C1360,139,1376,181,
    1392,213.3C1408,245,1424,267,1432,277.3L1440,288L1440,320L1432,320C1424,320,1408,320,1392,320C1376,320,
    1360,320,1344,320C1328,320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,320,1216,320,1200,320C1184,
    320,1168,320,1152,320C1136,320,1120,320,1104,320C1088,320,1072,320,1056,320C1040,320,1024,320,1008,320C992,
    320,976,320,960,320C944,320,928,320,912,320C896,320,880,320,864,320C848,320,832,320,816,320C800,320,784,320,768,320C752,320,736,320,720,320C704,320,688,320,672,320C656,320,640,320,624,320C608,320,592,320,576,320C560,320,544,320,528,320C512,320,496,320,480,320C464,320,448,320,432,320C416,320,400,320,384,320C368,320,352,320,336,320C320,320,304,320,288,320C272,320,256,320,240,320C224,320,208,320,192,320C176,320,160,320,144,320C128,320,112,320,96,320C80,320,64,320,48,320C32,320,16,320,8,320L0,320Z"></path></svg>
<svg id="wave-5" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,160L8,160C16,160,32,160,
    48,133.3C64,107,80,53,96,58.7C112,64,128,128,144,170.7C160,213,176,235,192,256C208,277,224,299,240,
    298.7C256,299,272,277,288,250.7C304,224,320,192,336,192C352,192,368,224,384,229.3C400,235,416,213,432,
    186.7C448,160,464,128,480,101.3C496,75,512,53,528,64C544,75,560,117,576,138.7C592,160,608,160,624,181.3C640
    ,203,656,245,672,266.7C688,288,704,288,720,261.3C736,235,752,181,768,170.7C784,160,800,192,816,186.7C832,
    181,848,139,864,122.7C880,107,896,117,912,149.3C928,181,944,235,960,240C976,245,992,203,1008,202.7C1024,203,
    1040,245,1056,266.7C1072,288,1088,288,1104,240C1120,192,1136,96,1152,48C1168,0,1184,0,1200,21.3C1216,43,
    1232,85,1248,128C1264,171,1280,213,1296,218.7C1312,224,1328,192,1344,192C1360,192,1376,224,1392,250.7C1408,
    277,1424,299,1432,309.3L1440,320L1440,320L1432,320C1424,320,1408,320,1392,320C1376,320,1360,320,1344,
    320C1328,320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,320,1216,320,1200,320C1184,320,1168,320,
    1152,320C1136,320,1120,320,1104,320C1088,320,1072,320,1056,320C1040,320,1024,320,1008,320C992,320,976,
    320,960,320C944,320,928,320,912,320C896,320,880,320,864,320C848,320,832,320,816,320C800,320,784,320,768,
    320C752,320,736,320,720,320C704,320,688,320,672,320C656,320,640,320,624,320C608,320,592,320,576,320C560,
    320,544,320,528,320C512,320,496,320,480,320C464,320,448,320,432,320C416,320,400,320,384,320C368,320,352,
    320,336,320C320,320,304,320,288,320C272,320,256,320,240,320C224,320,208,320,192,320C176,320,160,320,144,
    320C128,320,112,320,96,320C80,320,64,320,48,320C32,320,16,320,8,320L0,320Z"></path></svg>
<svg id="wave-6" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,192L8,176C16,160,
    32,128,48,117.3C64,107,80,117,96,106.7C112,96,128,64,144,74.7C160,85,176,139,192,133.3C208,128,224,
    64,240,42.7C256,21,272,43,288,53.3C304,64,320,64,336,58.7C352,53,368,43,384,37.3C400,32,416,32,432,
    64C448,96,464,160,480,170.7C496,181,512,139,528,106.7C544,75,560,53,576,48C592,43,608,53,624,85.3C640
    ,117,656,171,672,176C688,181,704,139,720,112C736,85,752,75,768,64C784,53,800,43,816,37.3C832,32,848,32
    ,864,74.7C880,117,896,203,912,208C928,213,944,139,960,101.3C976,64,992,64,1008,74.7C1024,85,1040,107,
    1056,138.7C1072,171,1088,213,1104,224C1120,235,1136,213,1152,176C1168,139,1184,85,1200,80C1216,75,1232,
    117,1248,117.3C1264,117,1280,75,1296,58.7C1312,43,1328,53,1344,101.3C1360,149,1376,235,1392,256C1408,277,
    1424,235,1432,213.3L1440,192L1440,320L1432,320C1424,320,1408,320,1392,320C1376,320,1360,320,1344,320C1328,
    320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,320,1216,320,1200,320C1184,320,1168,320,1152,320C1136,
    320,1120,320,1104,320C1088,320,1072,320,1056,320C1040,320,1024,320,1008,320C992,320,976,320,960,320C944
    ,320,928,320,912,320C896,320,880,320,864,320C848,320,832,320,816,320C800,320,784,320,768,320C752,320,
    736,320,720,320C704,320,688,320,672,320C656,320,640,320,624,320C608,320,592,320,576,320C560,320,544,
    320,528,320C512,320,496,320,480,320C464,320,448,320,432,320C416,320,400,320,384,320C368,320,352,320,336
    ,320C320,320,304,320,288,320C272,320,256,320,240,320C224,320,208,320,192,320C176,320,160,320,144,320C128
    ,320,112,320,96,320C80,320,64,320,48,320C32,320,16,320,8,320L0,320Z"></path></svg>
<svg id="wave-7" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,160L8,170.7C16,181,32
    ,203,48,208C64,213,80,203,96,170.7C112,139,128,85,144,106.7C160,128,176,224,192,229.3C208,235,224,149
    ,240,106.7C256,64,272,64,288,58.7C304,53,320,43,336,42.7C352,43,368,53,384,74.7C400,96,416,128,432,
    149.3C448,171,464,181,480,197.3C496,213,512,235,528,250.7C544,267,560,277,576,282.7C592,288,608,288,
    624,288C640,288,656,288,672,277.3C688,267,704,245,720,250.7C736,256,752,288,768,266.7C784,245,800,171,
    816,133.3C832,96,848,96,864,106.7C880,117,896,139,912,154.7C928,171,944,181,960,208C976,235,992,277,
    1008,298.7C1024,320,1040,320,1056,288C1072,256,1088,192,1104,165.3C1120,139,1136,149,1152,160C1168,171,
    1184,181,1200,170.7C1216,160,1232,128,1248,117.3C1264,107,1280,117,1296,128C1312,139,1328,149,1344,
    128C1360,107,1376,53,1392,58.7C1408,64,1424,128,1432,160L1440,192L1440,320L1432,320C1424,320,1408,
    320,1392,320C1376,320,1360,320,1344,320C1328,320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,
    320,1216,320,1200,320C1184,320,1168,320,1152,320C1136,320,1120,320,1104,320C1088,320,1072,320,1056,
    320C1040,320,1024,320,1008,320C992,320,976,320,960,320C944,320,928,320,912,320C896,320,880,320,864,
    320C848,320,832,320,816,320C800,320,784,320,768,320C752,320,736,320,720,320C704,320,688,320,672,320C656,
    320,640,320,624,320C608,320,592,320,576,320C560,320,544,320,528,320C512,320,496,320,480,320C464,320,448,
    320,432,320C416,320,400,320,384,320C368,320,352,320,336,320C320,320,304,320,288,320C272,320,256,320,240,
    320C224,320,208,320,192,320C176,320,160,320,144,320C128,320,112,320,96,320C80,320,64,320,48,320C32,320,
    16,320,8,320L0,320Z"></path></svg>
<svg id="wave-8" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,96L8,85.3C16,75,32,
    53,48,42.7C64,32,80,32,96,74.7C112,117,128,203,144,202.7C160,203,176,117,192,112C208,107,224,181,240,
    181.3C256,181,272,107,288,101.3C304,96,320,160,336,160C352,160,368,96,384,74.7C400,53,416,75,432,90.7C448,
    107,464,117,480,149.3C496,181,512,235,528,218.7C544,203,560,117,576,106.7C592,96,608,160,624,192C640,224,
    656,224,672,229.3C688,235,704,245,720,218.7C736,192,752,128,768,101.3C784,75,800,85,816,106.7C832,128,848
    ,160,864,165.3C880,171,896,149,912,138.7C928,128,944,128,960,128C976,128,992,128,1008,138.7C1024,149,1040
    ,171,1056,197.3C1072,224,1088,256,1104,272C1120,288,1136,288,1152,245.3C1168,203,1184,117,1200,96C1216,75,
    1232,117,1248,138.7C1264,160,1280,160,1296,144C1312,128,1328,96,1344,106.7C1360,117,1376,171,1392,
    170.7C1408,171,1424,117,1432,90.7L1440,64L1440,320L1432,320C1424,320,1408,320,1392,320C1376,320,1360,320,
    1344,320C1328,320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,320,1216,320,1200,320C1184,320,1168,
    320,1152,320C1136,320,1120,320,1104,320C1088,320,1072,320,1056,320C1040,320,1024,320,1008,320C992,320,976,
    320,960,320C944,320,928,320,912,320C896,320,880,320,864,320C848,320,832,320,816,320C800,320,784,320,768,
    320C752,320,736,320,720,320C704,320,688,320,672,320C656,320,640,320,624,320C608,320,592,320,576,320C560,
    320,544,320,528,320C512,320,496,320,480,320C464,320,448,320,432,320C416,320,400,320,384,320C368,320,352,
    320,336,320C320,320,304,320,288,320C272,320,256,320,240,320C224,320,208,320,192,320C176,320,160,320,144,
    320C128,320,112,320,96,320C80,320,64,320,48,320C32,320,16,320,8,320L0,320Z"></path></svg>
<svg id="wave-9" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,288L8,288C16,288,32,
    288,48,266.7C64,245,80,203,96,186.7C112,171,128,181,144,181.3C160,181,176,171,192,149.3C208,128,224,96
    ,240,90.7C256,85,272,107,288,117.3C304,128,320,128,336,112C352,96,368,64,384,53.3C400,43,416,53,432,
    96C448,139,464,213,480,240C496,267,512,245,528,213.3C544,181,560,139,576,138.7C592,139,608,181,624,
    186.7C640,192,656,160,672,128C688,96,704,64,720,96C736,128,752,224,768,261.3C784,299,800,277,816,
    245.3C832,213,848,171,864,144C880,117,896,107,912,122.7C928,139,944,181,960,170.7C976,160,992,96,1008,
    106.7C1024,117,1040,203,1056,240C1072,277,1088,267,1104,240C1120,213,1136,171,1152,149.3C1168,128,1184,
    128,1200,112C1216,96,1232,64,1248,58.7C1264,53,1280,75,1296,90.7C1312,107,1328,117,1344,149.3C1360,181,
    1376,235,1392,266.7C1408,299,1424,309,1432,314.7L1440,320L1440,320L1432,320C1424,320,1408,320,1392,
    320C1376,320,1360,320,1344,320C1328,320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,320,1216,
    320,1200,320C1184,320,1168,320,1152,320C1136,320,1120,320,1104,320C1088,320,1072,320,1056,320C1040,320,
    1024,320,1008,320C992,320,976,320,960,320C944,320,928,320,912,320C896,320,880,320,864,320C848,320,832,
    320,816,320C800,320,784,320,768,320C752,320,736,320,720,320C704,320,688,320,672,320C656,320,640,320,624,
    320C608,320,592,320,576,320C560,320,544,320,528,320C512,320,496,320,480,320C464,320,448,320,432,320C416,
    320,400,320,384,320C368,320,352,320,336,320C320,320,304,320,288,320C272,320,256,320,240,320C224,320,208,
    320,192,320C176,320,160,320,144,320C128,320,112,320,96,320C80,320,64,320,48,320C32,320,16,320,8,320L0,
    320Z"></path></svg>
<svg id="wave-10" name="wave" viewBox="0 0 1440 320"><path fill="#5fa8d3" fill-opacity="1" d="M0,128L8,133.3C16,139,
    32,149,48,165.3C64,181,80,203,96,208C112,213,128,203,144,170.7C160,139,176,85,192,96C208,107,224,181,
    240,192C256,203,272,149,288,128C304,107,320,117,336,149.3C352,181,368,235,384,229.3C400,224,416,160,
    432,117.3C448,75,464,53,480,80C496,107,512,181,528,197.3C544,213,560,171,576,144C592,117,608,107,624
    ,133.3C640,160,656,224,672,250.7C688,277,704,267,720,224C736,181,752,107,768,74.7C784,43,800,53,816,
    69.3C832,85,848,107,864,128C880,149,896,171,912,197.3C928,224,944,256,960,250.7C976,245,992,203,1008
    ,165.3C1024,128,1040,96,1056,112C1072,128,1088,192,1104,202.7C1120,213,1136,171,1152,165.3C1168,160,
    1184,192,1200,186.7C1216,181,1232,139,1248,112C1264,85,1280,75,1296,64C1312,53,1328,43,1344,80C1360,
    117,1376,203,1392,250.7C1408,299,1424,309,1432,314.7L1440,320L1440,320L1432,320C1424,320,1408,320,1392,
    320C1376,320,1360,320,1344,320C1328,320,1312,320,1296,320C1280,320,1264,320,1248,320C1232,320,1216,320,
    1200,320C1184,320,1168,320,1152,320C1136,320,1120,320,1104,320C1088,320,1072,320,1056,320C1040,320,1024,
    320,1008,320C992,320,976,320,960,320C944,320,928,320,912,320C896,320,880,320,864,320C848,320,832,320,816,
    320C800,320,784,320,768,320C752,320,736,320,720,320C704,320,688,320,672,320C656,320,640,320,624,320C608
    ,320,592,320,576,320C560,320,544,320,528,320C512,320,496,320,480,320C464,320,448,320,432,320C416,320,400
    ,320,384,320C368,320,352,320,336,320C320,320,304,320,288,320C272,320,256,320,240,320C224,320,208,320,192,
    320C176,320,160,320,144,320C128,320,112,320,96,320C80,320,64,320,48,320C32,320,16,320,8,320L0,
    320Z"></path></svg>
</body>
<?php
if(isset($_POST['u_email'])&&isset($_POST['u_password'])){
    @$db = new mysqli('localhost','root','','signal-site');
    if(mysqli_connect_errno()){
        die();
    }
    $uemail=$_POST['u_email'];
    $upass=$_POST['u_password'];
    $query="select * from person where email="."'".$uemail."'";
    $res=$db->query($query);
    if($res->num_rows){
        $row = $res->fetch_assoc();
        if(sha1($upass)==$row['password']){
            $_SESSION['email']= $uemail;
            $_SESSION['user_level']= $row['user_level'];
            $_SESSION['first']=ucfirst($row['first_name']);
            $_SESSION['last']=ucfirst($row['last_name']);
            $_SESSION['group'] = $row['group_id'];
            echo "<script> location.href='index.php';</script>";
        }
        else {

            echo " 
        <script>
               location.href='#log_in';
                setPane();
                let r= document.getElementById('ress');     
           r.innerHTML='Incorrect password';
           r.style.color='red';
        </script>
        ";

        }
    }
    else{
        echo " 
        <script>
        location.href='#login_in';
                  setPane();
                let r= document.getElementById('ress');
           r.innerHTML='Incorrect Email';
           r.style.color='red';
        </script>
        ";

    }
}
if(isset($_POST['log'])) echo "<script>f_change('li2','li1'); location.href='#login_in'; 
document.getElementById('sign_up').className='tab-pane fade';
document.getElementById('login_in').className='tab-pane fade active in';
</script>"
?>
</html>