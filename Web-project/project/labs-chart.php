<?php
session_start();
    $numberOfStudentWhoFinishLab = 0;
    $numberOfStudentWhoDoesNotFinishLab = 0;
    $labName = "";
if(isset($_POST['Greport'])){ setcookie('Greport',$_POST['Greport']);}
    if(isset($_POST['lab_name'])){

        $teacherEmail = $_SESSION['email'];
        $groupId  = $_COOKIE['Greport'];

        @$dataBase = new mysqli('localhost', 'root','','signal-site');
        if(mysqli_connect_errno()){

            echo "error: can not connect to the database";
            die();
        }

        $queryGetLabId = "select lab_id from lab where lab_name = '{$_POST['lab_name']}'";
        $labId = $dataBase->query($queryGetLabId);

        if($labId->num_rows == 0){
            echo '<div class="alert alert-danger fade in alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Incorrect lab name!</strong> Please make sure about the lab name.
                  </div>';
        }
        else{
            $rowOfLabID = $labId -> fetch_array();
            $labName = $_POST['lab_name'];

            $queryStuWhoFinishLab =  "select count(stu_email) from lab_student where done = 1 && group_id_lab = '{$groupId}' && lab_id = '{$rowOfLabID[0]}'";
            $countOfSutWhoFinishLab = $dataBase->query($queryStuWhoFinishLab);
            $arrCountOfSutWhoFinishLab = $countOfSutWhoFinishLab-> fetch_array();

            $queryStuWhoDoesNotFinishLab =  "select count(stu_email) from lab_student where done = 0 && group_id_lab = '{$groupId}' && lab_id = '{$rowOfLabID[0]}'";
            $countOfSutWhoDoesNotFinishLab = $dataBase->query($queryStuWhoDoesNotFinishLab);
            $arrCountOfSutWhoDoesNotFinishLab = $countOfSutWhoDoesNotFinishLab-> fetch_array();

            //echo $arrCountOfSutWhoFinishLab[0].'<br>'.$arrCountOfSutWhoDoesNotFinishLab[0];

            $numberOfStudentWhoFinishLab = $arrCountOfSutWhoFinishLab[0];
            $numberOfStudentWhoDoesNotFinishLab = $arrCountOfSutWhoDoesNotFinishLab[0];
        }

    }
    //function getNumberOfStudentsWhoFinishLab

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
s
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <style>

        body{
            font-family: "Ink Free";
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-4"><h1>Report of Labs</h1></div>

    </div>

    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <p style="font-size: 18px">
                This report represents the number of students who finished the lab which the teacher will enter its name in the text field below.
            </p>
        </div>

        <div class="col-sm-7">
            <canvas id="labs-chart"></canvas>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7"></div>
        <div class="col-sm-5" style="font-size: 15px">Chart represent the student who finished <?php echo $labName ?> lab </div>
    </div>


    <div class="row" style="font-size: 20px">
            <form action="labs-chart.php" method="post">
                <div class="col-sm-4">
                    <label for="email">Lab name:</label>
                    <input type="text" id="lab_name" placeholder="Lab name" name="lab_name">
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Generate Chart</button>
                </div>
            </form>
    </div>

</div>

<script>
    <?php

    ?>
    let ctx = document.getElementById('labs-chart').getContext('2d');
    let myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        responsive :true,
        data:{
            labels:['number of students who finished this lab','number of students who does not finished this lab'],
            datasets : [{
                data:[<?php echo $numberOfStudentWhoFinishLab ?>,<?php echo $numberOfStudentWhoDoesNotFinishLab ?>],
                backgroundColor:['green','red']

            }

            ]
        }

    });

</script>

</body>
</html>