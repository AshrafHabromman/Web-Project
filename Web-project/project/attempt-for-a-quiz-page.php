<?php
session_start();
if(isset($_SESSION['first'])){
    if($_SESSION['user_level'] == 2){
        require('nav-head-teacher.php');
    }
    else if($_SESSION['user_level'] == 1){
        require('nav-head-student.php');
    }
}else require('nav-head-visiter.php');

@$dataBase = new mysqli("localhost", "root", "", "signal-site");
if ($dataBase->connect_errno) {
    echo "<script>alert('Could not connect to server') </script>";
    die();
}
$quizId = $_POST['quizId'];

$queryGetQuiz = "select * from quize where quize_id = '{$quizId}'";

$result = $dataBase->query($queryGetQuiz);
if($result->num_rows != 0 ){
    $row = $result->fetch_assoc();
    $quizName = $row['quize_name'];
    $queryGetQuestions = "select * from question where quize_id = '{$quizId}'";
    $result = $dataBase->query($queryGetQuestions);

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signals and system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <style>
        body{
            font-family: "Ink Free";
        }
        .title{
            font-size: 50px;
        }
    </style>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-sm-4 title"><?php echo $quizName." quiz" ?></div>
    </div>

    <?php
    if(isset($_POST['userAnswer0']) && isset($_POST['numberOfQuestions'])){

        $numberOfCorrectAnswer = 0;

        for($i = 0; $i < $_POST['numberOfQuestions']; $i++){
            if( $_POST['correctAnswer'.$i] == $_POST['userAnswer'.$i]){
                $numberOfCorrectAnswer++;
            }
        }
        echo '
                <div class="row">
                    <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2" style="border: 3px solid black; border-radius: 5px; font-size: 18px; background-color: rgba(75, 235, 88,0.8)">'."Your grade is: ".$numberOfCorrectAnswer."/".$_POST['numberOfQuestions'].'</div>
                    <div class="col-sm-1"></div>
            ';
        if( !isset($_SESSION['first'])){
            echo ' 
                    <div class="col-sm-7" style="font-size: 15px"><div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong> If you want to see your progress you have to sign in! 
                        <a href="Login_signin.php">Sign in now.</a>
                    </div>
                    </div>
                </div>

            ';
        }

        else if(isset($_SESSION['first']) && $_SESSION['user_level'] == 1){

            $dataBase2 = new mysqli("localhost", "root", "", "signal-site");
            if ($dataBase->connect_errno) {
                echo "<script>alert('Could not connect to server') </script>";
                die();
            }
            $email = $_SESSION['email'];
            $date = date("Y-m-d");

            $queryCheckIfUserAttempt = "select * from take_quize where quize_id = '{$quizId}' and student_email = '{$email}'";
            $resultOfCheck = $dataBase2->query($queryCheckIfUserAttempt);

            if($resultOfCheck->num_rows == 0){
                $numberOfQuestions =  $_POST['numberOfQuestions'];
                $querySaveGrade = $dataBase->prepare("insert into take_quize values (?,?,?,?,?)");
                $querySaveGrade->bind_param("ssisi", $quizId, $email, $numberOfCorrectAnswer, $date,$numberOfQuestions);
                $r = $querySaveGrade->execute();
                $dataBase2->close();
            }
            else{
                $date = date("Y-m-d");
                $queryUpdateGrade = "update take_quize set grade = '{$numberOfCorrectAnswer}',date = '{$date}' where student_email = '{$email}' and quize_id = '{$quizId}'";
                $res = $dataBase2->query($queryUpdateGrade);
                $dataBase2->close();
            }
        }
    }


    ?>
    <form action="attempt-for-a-quiz-page.php" method="post">
    <?php
    for($i = 0; $i < $result->num_rows; $i++){
        $numberOfQuestions = $result->num_rows;
        $row = $result->fetch_assoc();
        echo '    
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9"><h4>'.$row['question_text'].'</h4></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6"><div class="radio"><input required="true" type="radio" value="1" name='."userAnswer".$i.'></div><p>'.$row['question_answer1'].'</p></div>
                <div></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6"><div class="radio"><input  type="radio" value="2" name='."userAnswer".$i.'></div><p>'.$row['question_answer2'].'</p></div>
                <div></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6"><div class="radio"><input type="radio" value="3" name='."userAnswer".$i.'></div><p>'.$row['question_answer3'].'</p></div>
                <div></div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6"><div class="radio"><input type="radio" value="4" name='."userAnswer".$i.'></div><p>'.$row['question_answer4'].'</p></div>
                <div></div>
            </div>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <input type="hidden" name='."correctAnswer".$i.' value='.$row['correct_answer'].'>
            
            <input type="hidden" name="quizId" value='.$quizId.'>
            <input type="hidden" name="numberOfQuestions" value='.$numberOfQuestions.'>
            ';
    }

    ?>
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"><input name="submit" type="submit" value="Submit" class="btn btn-success btn-lg"> </div>
        </div>
    </form>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">


</div>



</body>
</html>
    <?php


}
else{
    echo "<script>alert('There is no any quiz have id = '.$quizId) </script>";
}

