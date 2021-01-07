
<?php
session_start();
if(isset($_POST['qDescription1'])){
    @$dataBase = new mysqli('localhost', 'root','','signal-site');
    if($dataBase->connect_errno){
        echo "<script>alert('Could not connect to DB');";
        echo "history.go(-1); </script>";
    }
    if(!isset($_SESSION['email'])){
        echo "<script>alert('You are not a teacher');";
        echo '<script>location.href = "index.php";</script>';
        die();
    }


    $numberOfQuestions = $_POST['numberOfQuestions'];
    $email = $_SESSION['email'];
    $quizName = $_POST['txtFQuizName'];
    $quizId = $_POST['txtFQuizId'];

    $queryAddNewQuiz =$dataBase->prepare("insert into quize (quize_id, creator_email, quize_name) values(?,?,?)");
    $queryAddNewQuiz->bind_param("sss",$quizId,$email,$quizName);
    $r=$queryAddNewQuiz->execute();
    //echo $r.'<br>';
    //echo $_POST['optionRadio1'];
    for($i = 1 ; $i <= $numberOfQuestions; $i++){

        $questionText = $_POST['qDescription'.$i];
        $question_answer1 = $_POST['answerA'.$i];
        $question_answer2 = $_POST['answerB'.$i];
        $question_answer3 = $_POST['answerC'.$i];
        $question_answer4 = $_POST['answerD'.$i];
        $correct_answer = $_POST['optionRadio'.$i];
        $questionId = $quizId.$i;
        $queryAddNewQuestion =$dataBase->prepare("insert into question (question_id, quize_id,question_text, question_answer1, question_answer2, question_answer3, question_answer4, correct_answer) values(?,?,?,?,?,?,?,?)");
        $queryAddNewQuestion->bind_param("sssssssi",$questionId, $quizId, $questionText, $question_answer1, $question_answer2, $question_answer3, $question_answer4, $correct_answer);
        $r=$queryAddNewQuestion->execute();
        //echo $r.'<br>';
    }
    $dataBase->close();
    echo '<script type="text/javascript">alert("Quiz has been created successfully.")</script>';
    echo '<script>location.href = "index.php";</script>';

}
else {
    echo '<script type="text/javascript">alert("You have to add at least one question.")</script>';
    echo '<script>location.href = "quiz-create-teacher-page.php";</script>';
}

?>

