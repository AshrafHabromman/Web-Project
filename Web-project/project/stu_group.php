<?php
session_start();
if(!isset($_SESSION['first'])) echo "<script>location.href='index.php' </script>";
if($_SESSION['user_level']==2) echo "<script>location.href='index.php' </script>";
@$db = new mysqli("localhost","root","","signal-site");
if($db->connect_errno) die();
if($_SESSION['group']!=null) {
    $q = "update person set group_id = NULL where person.email="."'".$_SESSION['email']."'" ;
    $db->query($q);
    $_SESSION['group']=null;
    echo "<script>this.close();</script>";
    $db->close();
}

else{
    if(isset($_POST['group_id']))
    {
        $gid = $_POST['group_id'];
        $q ="select * from site_group where site_group_id="."'".$gid."'";
        $res=$db->query($q);
        if($res->num_rows){
            $q = "update person set group_id = "."'".$gid."'"." where person.email="."'".$_SESSION['email']."'" ;
            $db->query($q);
            $_SESSION['group']=$gid;
            $q ="update lab_student set group_id_lab ="."'".$gid."'"." where lab_student.stu_email="."'".$_SESSION['email']."'" ;
            $db->query($q);
            $db->close();
            echo "<script>this.close();</script>";
        }
        else {
            $db->close();
            echo "<script> alert('Could not find this group please check the ID '); this.close(); </script>";
        }
    }
} ?>
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
</head>
<body>
<form class="form-horizontal" method="post" action="stu_group.php">
    <div class="form-group">
        <label for="group_id" class="control-label col-sm-2">Email</label>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </div>
                <input type="text" name="group_id" autocomplete="on" id="group_id" class="form-control" placeholder="Enter your class ID" required>
            </div></div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" value="Join in" class="btn btn-default">
        </div>
    </div>
</form>


</body>

</html>