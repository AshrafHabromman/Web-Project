
<?php

$globalLabID = '';
session_start();

class DoneButtClass{

     static function  doneButton($LabId){
        $GLOBALS['$globalLabID']= $LabId;

        if(isset($_SESSION['email'])){

            if($_SESSION['user_level'] == 1){
                @$dataBase = new mysqli("localhost","root","","signal-site");
                if(mysqli_connect_errno()){
                    echo '<div class="alert alert-success alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Error!</strong>: can not connect to the data base .</div>';
                    die();
                }
                //echo $_SESSION['email']." ".$LabId;

                $email = $_SESSION['email'];
                $queryIsDone = "select * from lab_student where stu_email = '{$email}' and lab_id ='{$LabId}'";
                $result = $dataBase->query($queryIsDone);

                if($result->num_rows){
                    $row = $result->fetch_assoc();
                    $isDone = $row['done'];
                    if($isDone == 1){
                        echo '<div class="alert alert-success alert-dismissible">
                        <strong>Success!</strong> This Lab is already taken.
                        </div>';
                    }
                    else{

                        echo '<button onclick="markAsTaken();" type="button" class="btn btn-info btn-block" id="doneButton">Mark this lab as taken lab.</button>';
                    }
                }
                /*else{
                    echo '<button onclick="markAsTaken();" type="button" class="btn btn-info btn-block" id="doneButton">Mark this lab as taken lab.</button>';
                }*/
            }
        }
        else echo '<div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> If you want to see your progress you have to sign in! 
                <a href="Login_signin.php">Sign in now.</a>
                </div>';
    }

    static function markLabAsTaken(){

         echo "hiiiiiii";

        $labId2 = $GLOBALS['$globalLabID'] ;
        $user_email = $_SESSION['email'];
        @$dataBase = new mysqli("localhost","root","","signal-site");

        if(mysqli_connect_errno()){
            echo '<div class="alert alert-success alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Error!</strong>: can not connect to the data base .</div>';
            die();
        }
        $queryUpdateDone = "update lab_student set done = 1 where stu_email='{$user_email}' and lab_id = '{$labId2}'";
        $result = $dataBase->query($queryUpdateDone);
        $dataBase->close();
    }


}

?>

