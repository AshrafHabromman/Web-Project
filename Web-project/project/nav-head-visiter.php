<?php
echo '
<nav class="navbar navbar-primary">
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
            if(isset($_SESSION['first'])) echo ' <li><a href="sign_out.php"><span class="glyphicon glyphicon-log-in"></span> Sign out</a></li>';
             else echo '<li><a href="login_signin.php"><span class="glyphicon glyphicon-user"></span> Log in/Sign Up</a></li>';
        echo '</ul>
    </div>
</nav>';
