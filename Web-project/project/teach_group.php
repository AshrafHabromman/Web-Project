<?php
session_start();
require ('nav-head-teacher.php');
if(!isset($_SESSION['first'])) echo "<script>location.href='index.php'</script>";
if($_SESSION['user_level']==1) echo "<script>location.href='index.php'</script>";
@$mysqli = new mysqli( "localhost","root","","signal-site");
if($mysqli->connect_errno){
    echo "<script>alert('Could not connect to server') </script>";
    die();
}
if(isset($_POST['newG'])){
    $newGroupID = $_POST['newG'];
    $newGroupQuery = "insert into site_group (site_group_id,admin_email) values (?,?)";
    $newGroupQuery=$mysqli->prepare($newGroupQuery);
    $newGroupQuery->bind_param("ss",$newGroupID,$_SESSION['email']);
    $newGroupQuery->execute();
}

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
    </style>


</head>
<body>

<div class="container">
    <h2>Students Groups</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>GroupID</th>
            <th>Number of students</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $q = "select site_group_id from site_group where admin_email ="."'".$_SESSION['email']."'" ;
        $res=$mysqli->query($q);
        for($i=0;$i<$res->num_rows;$i++){
            $row = $res->fetch_assoc();
            $num = $row['site_group_id'];
            echo "<tr>";
            echo "<td>".$num."</td>";
            $q = "select email from person where group_id ="."'".$num."'"."and user_level = 1";
            $r=$mysqli->query($q);
            echo "<td>".$r->num_rows."</td>";
            echo "</tr>";
        }
        ?>
        <div class="container">
            <h3>Create a new group</h3>
            <div class="row">
                <form class="form-inline" action="teach_group.php" method="post">
                    <div class="form-group col-sm-3"><input maxlength="10" type="text" name="newG" id="newG" placeholder="Enter New Group ID" style="width: 100%;"></div>
                    <div class="form-group col-sm-1"><input type="submit" class="btn btn-primary" value="Create" style="width: 100%;"></div>
                </form>
            </div>
        </div>
        </tbody>
    </table>
</div>
<div class="container">
    <div class="row">
        <form class="form-inline"   method="post">
            <div id="group_sel" class="form-group col-sm-3"></div>
            <div class="form-group col-sm-3"><input type="submit" class="btn btn-primary" formtarget="_blank" formaction="chart-hw.php" value="Get Students' grade report" style="width: 100%;"></div>
            <div class="form-group col-sm-3"><input type="submit" class="btn btn-primary" formtarget="_blank" formaction="labs-chart.php" value="Get Students' lab progress report" style="width: 100%;"></div>
        </form>
    </div>
</div>
</body>
<script type="text/javascript">
    function gen (values,select_name,m_massege,parent_ID){
        var select = document.createElement("select");
        select.name = select_name;
        select.id = select_name
        select.className="form-control";
        for (const val of values) {
            var option = document.createElement("option");
            option.text = val;
            option.value = val;
            select.appendChild(option);
        }

        var label = document.createElement("label");
        label.innerHTML = m_massege ;
        label.htmlFor = select_name;

        document.getElementById(parent_ID).appendChild(label).appendChild(select);
    }
    document.body.onload= function () {
        <?php
        $db = new mysqli('localhost','root','','signal-site');
        $query = "Select site_group_id from site_group where admin_email="."'".$_SESSION['email']."'";
        $res = $db->query($query);
        $data="" ;
        for($i = 0; $i< $res->num_rows;$i++) {
            $result = $res->fetch_array();
            $data.= "'".$result[0]."'";
            if($i!=$res->num_rows -1) $data.=',';
        }
        ?>
        var values = [<?php echo $data ?>];
        gen(values,'Greport','Select Your Group ID','group_sel');}
</script>
</html>