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


@$mysqli = new mysqli( "localhost","root","","signal-site");
if($mysqli->connect_errno){
    echo "<script>alert('Could not connect to server') </script>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizzes Page</title>
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
    </style>
</head>
<body>

<div class="container">
    <h2>Quizzes</h2>
    <div class="row">
        <div class="col-sm-5"></div>
        <form action="attempt-for-a-quiz-page.php" method="post">
            <div class="col-sm-3"><label for="">Copy quiz id and past it here:</label></div>
            <div class="col-sm-2"><input class="form-control" required="true" type="text" name="quizId" id="quizId" maxlength="5"></div>
            <div class="col-sm-2"><button type="submit" class="btn btn-success ">attempt now!</button></div>
        </form>
    </div>
    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Quiz name</th>
            <th>Quiz id</th>
            <th>Creator email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $q = "select * from quize";
        $res=$mysqli->query($q);
        for($i=0;$i<$res->num_rows;$i++){
            $row = $res->fetch_assoc();
            $quizName = $row['quize_name'];
            $quizId = $row['quize_id'];
            $creator = $row['creator_email'];
            echo "<tr>";
            echo "<td>".$quizName."</td>";
            echo "<td>".$quizId."</td>";
            echo "<td>".$creator."</td>";
            echo "<tr>";
        }
        ?>
        </tbody>
    </table>
</div>



</body>
</html>