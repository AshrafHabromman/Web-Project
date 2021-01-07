<?php
@$mysqli = new mysqli("localhost","root","","signal-site");
if($mysqli->connect_errno){
    echo "<script>alert('Could not connect to DB');";
    echo "history.go(-1); </script>";
}
$fname = $_POST['nu_fname'];
$lname = $_POST['nu_lname'];
$email = $_POST['nu_email'];
$pass = $_POST['nu_pass'] ;
$nu_ul = $_POST['nu_ul'];
if(! isset($fname)&& ! isset($lfname)&&! isset($email)&&! isset($pass)&&! isset($nu_ul)){echo "<script> location.href='index.php' </script>";}
else{
    if (!get_magic_quotes_gpc()) {
        $fname = addslashes($fname);
        $lname = addslashes($lname);
        $email = addslashes($email);
        $pass = doubleval($pass);
        $nu_ul= intval($nu_ul);
    }
    $query="select * from person where email="."'".$email."'";
    $res=$mysqli->query($query);
    //echo  $res->num_rows ; // ashraf
    if($res->num_rows) {
        echo "<script> alert('This Email is already token'); location.href='login_signin.php';  </script>" ;
    }
    $null = null;
    $query = $mysqli->prepare(" insert into person (first_name, last_name, email, password, group_id, user_level) values (?,?,?,?,?,?)");
    $pass = sha1($pass);
    $query->bind_param("sssssi",$fname,$lname,$email,$pass,$null,$nu_ul);
    $r=$query->execute();
    ///ashraf
    $queryGetAllLabs = "select * from lab";
    $result = $mysqli->query($queryGetAllLabs);
    for($i = 0 ; $i < $result->num_rows ; $i++){
        $done = 0 ;
        $row = $result->fetch_assoc();
        $queryInsertLabStu = $mysqli->prepare(" insert into lab_student (lab_id, stu_email, done, group_id_lab) values (?,?,?,?)");
        $queryInsertLabStu->bind_param("ssis", $row['lab_id'], $email, $done, $null);
        $r = $queryInsertLabStu->execute();
    }

    $query->close();
    $mysqli->close();
    echo "<script> alert('Account has been made succesfully'); </script>";
    echo "<script type='text/javascript'>location.href='index.php';</script>";
}
?>

<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>