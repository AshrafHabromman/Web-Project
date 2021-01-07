<?php
echo '<nav class="navbar navbar-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Signals and Systems</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="active"><a href="quizzes-page.php">Quizzes</a></li>
            <li class="active"><a href="labs-page.php">Labs</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">';
            if(isset($_SESSION['first'])) echo ' 
            
            <li>
                <div class="dropdown">
                <img src="resources/profile_student.png" alt="Avatar" style="width:50px;height: 50px">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">'.$_SESSION['first']." ".$_SESSION['last'].
                    '
                    
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            
                        <li><a class="btn btn-primary" '; echo  $_SESSION['user_level']==1?'onclick="openEditGroup()">':'href="teach_group.php">';
                            if($_SESSION['user_level']==1&&$_SESSION['group']==null) echo "Join a group";
                            else if($_SESSION['user_level']==1&&$_SESSION['group']!=null) echo "your Group is ".$_SESSION['group'];
                            else echo "My Groups";
                            echo ' </a></li>
                        <li><a class="btn btn-primary"'; if($_SESSION['user_level']==1) echo "href='stu_grade.php'>"; else if ($_SESSION['user_level']==2) echo "href='teacher_quiz'>";
                            if($_SESSION['user_level']==1)  echo "My grades";
                            else if($_SESSION['user_level']==2)echo"My Quizzes";
                        echo '</a></li>
                        </ul>
                </div>
            </li>';
            if($_SESSION['first'])echo '<li><a href="sign_out.php"><span class="glyphicon glyphicon-log-in"></span> Sign out</a></li>';
             else echo '<li><a href="login_signin.php"><span class="glyphicon glyphicon-user"></span> Log in/Sign Up</a></li>' ;
        echo '</ul>
    </div>
</nav>
';
