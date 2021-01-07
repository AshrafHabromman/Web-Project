<?php
echo '<nav class="navbar navbar-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Signals and Systems</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li ><a href="teach_group.php">My groups</a></li>
            <li ><a href="quizzes-page.php">Quizzes</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">';
        if(isset($_SESSION['first'])) echo ' 
            
            <li>
                <div class="dropdown">
                <img src="resources/profile_teacher.jpg" alt="Avatar" style="width:50px;height: 50px">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">'.$_SESSION['first']." ".$_SESSION['last'].
    '
                    
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            
                        <li><a class="btn btn-primary" href="teach_group.php">';

                    echo "My Groups";
                    echo ' </a></li>
                        <li><a class="btn btn-primary"'; if($_SESSION['user_level']==1) echo "href='stu_grade.php'>"; else if ($_SESSION['user_level']==2) echo "href='quiz-create-teacher-page.php'>";
                    if($_SESSION['user_level']==1)  echo "My grades";
                    else if($_SESSION['user_level']==2)echo"Create a quiz";
                    echo '</a></li>
                        </ul>
        
        <ul class="nav navbar-nav navbar-right">
            <li><a href="sign_out.php"><span class="glyphicon glyphicon-log-in"></span> Sign out</a></li>
        </ul>
    </div>
</nav>';

