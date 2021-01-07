
<?php
session_start();
require ('nav-head-teacher.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a quiz</title>

    <meta charset="UTF-8">
    <title>Signals and system</title>
    <!-- bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <!-- j query -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
        .title{
            font-size: 50px;
        }
        body{
            font-family: "Ink Free";
        }
        .left-side{
            font-size: 28px
        }

    </style>

    <script>
        let counter = 1 ;
        let qDescription = "qDescription"+counter;
        console.log(qDescription);
        let optionRadio = "optionRadio"+counter;
        let answerA = "answerA"+counter;
        let answerB = "answerB"+counter;
        let answerC = "answerC"+counter;
        let answerD = "answerD"+counter;

        $(document).ready(function(){

            $("#addNewQ").click(
                function(){
                    qDescription = "qDescription"+counter;
                    console.log(qDescription);
                    optionRadio = "optionRadio"+counter;
                    answerA = "answerA"+counter;
                    answerB = "answerB"+counter;
                    answerC = "answerC"+counter;
                    answerD = "answerD"+counter;

                    if(counter < 11){
                        $("#divQuestions").append(" <div class=\"row\">\n" +
                            "                <div class=\"col-sm-4\">Question '"+counter+"':</div>\n" +
                            "            </div>\n" +
                            "            <div class=\"row\">\n" +
                            "                <div class=\"col-sm-1\"></div>\n" +
                            "                <div class=\"col-sm-3\">Question description:</div>\n" +
                            "                <div class=\"col-sm-8\" ><textarea id='"+qDescription+"' name='"+qDescription+"' required=\"true\" class=\"form-control\" rows=\"5\" ></textarea></div>\n" +
                            "            </div> <div class=\"row\">\n" +
                            "                <div class=\"col-sm-12\"><pre style=\"visibility: hidden\"> </pre></div>  <!--above of the title (empty) (space) -->\n" +
                            "            </div> \n" +
                            "            \n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-3\"></div>\n" +
                            "                    <div class=\"col-sm-1\">\n" +
                            "                        <div class=\"radio\">\n" +
                            "                        <input type=\"radio\" name='"+optionRadio+"' value='1' checked>\n" +
                            "                        </div>\n" +
                            "                    </div>\n" +
                            "                    <div class=\"col-sm-6\"><input type=\"text\" required=\"true\" class=\"form-control\" id='"+answerA+"' name='"+answerA+"'></div>\n" +
                            "                </div>\n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-12\"><pre style=\"visibility: hidden\"> </pre></div>  <!--above of the title (empty) (space) -->\n" +
                            "                </div>\n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-3\"></div>\n" +
                            "                    <div class=\"col-sm-1\">\n" +
                            "                        <div class=\"radio\">\n" +
                            "                        <input type=\"radio\" name='"+optionRadio+"' value='2'>\n" +
                            "                        </div>\n" +
                            "                    </div>\n" +
                            "                    <div class=\"col-sm-6\"><input type=\"text\" required=\"true\" class=\"form-control\" id='"+answerB+"' name='"+answerB+"'></div>\n" +
                            "                </div>\n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-12\"><pre style=\"visibility: hidden\"> </pre></div>  <!--above of the title (empty) (space) -->\n" +
                            "                </div>\n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-3\"></div>\n" +
                            "                    <div class=\"col-sm-1\">\n" +
                            "                        <div class=\"radio\">\n" +
                            "                        <input type=\"radio\" name='"+optionRadio+"' value='3'>\n" +
                            "                        </div>\n" +
                            "                    </div>\n" +
                            "                    <div class=\"col-sm-6\"><input type=\"text\" required=\"true\" class=\"form-control\" id='"+answerC+"' name='"+answerC+"'></div>\n" +
                            "                </div>\n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-12\"><pre style=\"visibility: hidden\"> </pre></div>  <!--above of the title (empty) (space) -->\n" +
                            "                </div>\n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-3\"></div>\n" +
                            "                    <div class=\"col-sm-1\">\n" +
                            "                        <div class=\"radio\">\n" +
                            "                        <input type=\"radio\" name='"+optionRadio+"' value='4'>\n" +
                            "                        </div>\n" +
                            "                    </div>\n" +
                            "                    <div class=\"col-sm-6\"><input type=\"text\" required=\"true\" class=\"form-control\" id='"+answerD+"' name='"+answerD+"'></div>\n" +
                            "                </div>\n" +
                            "                <div class=\"row\">\n" +
                            "                    <div class=\"col-sm-12\"><pre style=\"visibility: hidden\"> </pre></div>  <!--above of the title (empty) (space) -->\n" +
                            "                </div>");
                        document.getElementById("numberOfQuestions").value = counter;
                        counter++;
                    }
                    else{
                        $("#divAlert").append("<div class=\"alert alert-warning\">\n" +
                            "  <strong>Warning!</strong> Can not add one more\n" +
                            "</div>");
                    }

            });
        });


    </script>


</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
    </div>
    <div class="row">
        <div class="col-sm-4 title" >Create a quiz</div>  <!--above of the title (empty) (space) -->
    </div>

    <form action="quiz-teacher-handle.php" method="post" style="font-size: 22px">

    <div class="row">
        <div class="col-sm-4"><label for="txtFQuizName">Quiz name:</label></div>
        <div class="col-sm-4"><input type="text" class="form-control" required="true" id="txtFQuizName" name="txtFQuizName"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"><label for="txtFQuizId">Quiz ID:</label></div>
        <div class="col-sm-4"><input type="text" class="form-control" required="true" maxlength="5" name="txtFQuizId""></div>
    </div>
    <div id="divQuestions">

    </div>

        <input type="hidden" value="" id="numberOfQuestions" name="numberOfQuestions">

        <div class="row">
            <div class="col-sm-12"><pre style="visibility: hidden"> </pre></div>  <!--above of the title (empty) (space) -->
        </div>
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"><input name="submit" type="submit" value="Create this Quiz." class="btn btn-success btn-lg"> </div>
        </div>
    </form>

    <div class="row" style="font-size: 22px">
        <div class="col-sm-4"><button type="button" class="btn btn-success btn-lg" id="addNewQ" >Add a question.</button></div>
        <div class="col-sm-8" id="divAlert" ></div>
    </div>

</div>


</body>

</html>
