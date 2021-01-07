<?php
session_start();
if(isset($_POST['Greport'])){ setcookie('Greport',$_POST['Greport']);}
if(isset($_POST['Quiz_group'])) {
    @$db = new mysqli('localhost', 'root', '', 'signal-site');
    if ($db->connect_errno) {
        echo "<script>alert('Could not connect to DB');";
        echo "history.go(-1); </script>";
    }
    $query = $db->prepare("SELECT grade, COUNT(1) FROM take_quize,person WHERE person.email=take_quize.student_email and person.group_id=? and take_quize.quize_id=? GROUP BY grade ORDER by grade DESC");
    $group = $_COOKIE['Greport'];
    $quiz = $_POST['Quiz_group'];
    $query->bind_param("ss", $group, $quiz);
    $query->execute();
    $resl = $query->get_result();
    $grades="";
    $gardesCount="";
    $colors ="";
    for($i = 0; $i< $resl->num_rows;$i++) {
        $result = $resl->fetch_array();
        $grades.=$result[0];
        $gardesCount.= '"'.$result[1].'"';
        if($i%2==0) $colors.="'rgba(255, 99, 132, 0.2)'";
        else $colors.="'rgba(54, 162, 235, 0.2)'";
        if($i!=$resl->num_rows -1) {
            $grades.=',';
            $gardesCount.=',';
            $colors.=',';
        }
    }
    $db->close();
}
?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <html>
    <style>
        body{
            font-family: "Ink Free";
        }
    </style>
    <h2>Students grades</h2>
    <body>
    <nav class="navbar ">
        <form class="form-inline"  action="chart-hw.php" method="post">
            <div id="quiz_sel" class="form-group"></div>
            <button class="btn btn-default" style="background-color: #5FA8D3"  type="submit">Print result</button>
        </form>
    </nav>
    <div style="width: 100%;height: 50%">
    <canvas id="myChart" width="100%" height="30%"></canvas>
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
        document.body.onload = function() {
            <?php
            $db = new mysqli('localhost','root','','signal-site');
            $query = "Select quize_id from quize";
            $res = $db->query($query);
            $data2="" ;
            for($i = 0; $i< $res->num_rows;$i++) {
                $result = $res->fetch_array();
                $data2.= '"'.$result[0].'"';
                if($i!=$res->num_rows -1) $data2.=',';
            }
            $db->close();
            ?>
            var Quziez = [<?php echo $data2 ?>]
            gen(Quziez,"Quiz_group","Select a quiz","quiz_sel");
        }
    </script >
    </html>
<?php
if(isset($_POST['Quiz_group'])) {
    echo "
<script type='text/javascript'>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [";
    echo $grades."],
        datasets: [{
           barPercentage: 0.5,
            label: 'Grades of students',
            data: ["; echo $gardesCount."],
            backgroundColor: [";
    echo $colors."
],
            borderColor: [";
    echo $colors."
],
            borderWidth: 1
        }]
},
options: {

    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true,
                stepSize: 1     
                }
        }]
        }
}
}); </script> "; }


?>