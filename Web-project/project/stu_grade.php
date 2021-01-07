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

if(!isset($_SESSION['email'])|| $_SESSION['user_level']==2) echo "<script>location.href='index.php' </script>";
@$mysqli = new mysqli("localhost","root","","signal-site");
if($mysqli->errno) {echo "<script>alert('Couldnt connect to the database ') </script>";
die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signals and system</title>
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

        .title{
            font-size: 50px;
        }
        </style>
</head>
<body>

<h3>Student grades</h3>
<table class="table table-bordered">
    <thead>
        <th>Quiz name</th>
         <th> Grade</th>
        <th> Grade is out of</th>
        <th> Date</th>
    </thead>
<?php
$query = "SELECT quize.quize_name , take_quize.grade , take_quize.max_grade , take_quize.date FROM quize , take_quize where quize.quize_id= take_quize.quize_id and take_quize.student_email = ?";
$query=$mysqli->prepare($query);
$query->bind_param("s",$_SESSION['email']);
$query->execute();
$res=$query->get_result();
for($i =0;$i<$res->num_rows;$i++){
    $row = $res->fetch_array();
    echo "<tr>";
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "</tr>";
}
$mysqli->close();
?>
</table>
</body>
</html>