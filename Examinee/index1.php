
<?php
session_start();
require 'connect.php';

// //first time entry to quiz page
// if(isset($_SESSION['subjChosen'])) {  // restrict users from directly jumping to this page without login
//     $subject = htmlspecialchars($_SESSION['subjChosen']);
//     unset($_SESSION['subjChosen']);
// } else if (isset($_POST['fnName']) && $_POST['fnName'] === 'insertAns') {
//     insertAns();
//     exit();
// } else {
//     error_log("Suspicious user",1,"its.mathy@gmail.com"); /////////****************************** not working
//     header("Location: startQuiz.php");
// }

function insertAns(){
    $user_id = $_SESSION['user_id'];
    $quiz_id = $_POST['quiz_id'];
    $que_id = $_POST['que_id'];
    $ans = $_POST['ans'];
    
    $sql = "INSERT INTO answer (user_id, quiz_id, que_id, ans) VALUES(" .$user_id ."," .$quiz_id."," .$que_id .",'".$ans . "')";
    $result = mysqli_query($GLOBALS['dbConn'], $sql);

    if(!$result) {
        echo("Database error while recording user answers. Report to test@gmail.com");
    } else {
        echo("User answer is recorded successfully");
    }
}

            
?>





<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<body>
	<table style="background-color:#FFFFFF;width:100%;opacity:.9;"><tr><td>
	<div id="full">
	<a name="top"> </a>
	<table style="width:100%; hight:150px;">
	<tr><td>
	<div style=""><img src="../image/11.PNG" height="150" width="125"/></div></td><td><div style="font-size:40px;">
	<b>Computer &nbsp;&nbsp;Science &nbsp;&nbsp;&amp;&nbsp;&nbsp; Engineering&nbsp;&nbsp; Department(CSED)</b>
	</br><i>Motilal Nehru National Institute of Technology Allahabad</i></div>
	</td></tr>
	</table>
<script>
var i = 1;
var questions = [];
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    questions = JSON.parse(this.responseText);
  }
};
xmlhttp.open("GET", "fetch_que.php", true);
xmlhttp.send();


function myFunction()
{
	if( i < questions.length)
	{
		document.getElementById("snn").style.visibility = "visible";
		document.getElementById("start").style.visibility = "hidden";
		document.getElementById('que_no').innerHTML = i + "\t" + questions[i]["text_question"];
		document.getElementById('myImg').src = questions[i]["img_question"];
		document.getElementById('options').innerHTML = '<input type="radio" name="option" value="a">'+questions[i]["op_a"]+'<br><input type="radio" name="option" value="b">'+questions[i]["op_b"]+'<br><input type="radio" name="option" value="c">'+questions[i]["op_c"]+'<br><input type="radio" name="option" value="d">'+questions[i]["op_a"]+'<br>';
		i++;

		$user_id = $_SESSION['user_id'];
    $quiz_id = $_POST['quiz_id'];
    $que_id = $_POST['que_id'];
    $ans = $_POST['options'];
    
    $sql = "INSERT INTO answer (ans) VALUES(".$ans . ")";
    //$result = mysqli_query($GLOBALS['dbConn'], $sql);
    		$result = mysql_query($sql);


		if(i == questions.length)
		{
			document.getElementById("submit").style.visibility = "visible";
			document.getElementById("snn").style.visibility = "hidden";

	// $user_id = $_SESSION['user_id'];
 //    $quiz_id = $_POST['quiz_id'];
 //    $que_id = $_POST['que_id'];
 //    $ans = $_POST['options'];
    
 //    $sql = "INSERT INTO answer (user_id, quiz_id, que_id, ans) VALUES(" .$user_id ."," .$quiz_id."," .$que_id .",'".$ans . "')";
 //    //$result = mysqli_query($GLOBALS['dbConn'], $sql);
 //    		$result = mysql_query($sql);


		}
	}
}
</script>
</head>


<html>
<body>

<div class="container" >
<div style="height: 100px;">
	<!--INDEX BUTTONS-->
</div>
<form action="save_ans.php" method="post">
<div id="question" style="background-color: peach;">
	<span style="display: inline;">
		<h4 id="que_no"></h4>
		<h4 id="textque"></h4>
	</span>
	
	<img id="myImg" src="..\image\instr.jpeg" width="550" height="260">
	<div id="options">
	</div>
</div>
<input type="submit" id="submit" style="visibility: hidden;" value="Submit Answers">
</form>

<button onclick="myFunction() "  id="snn" style="visibility: hidden;">Save and Next</button><br>
<button onclick="myFunction()" id="start" style="visibility: visible;">Start Quiz</button>

</div>
</body>

<script type="text/javascript">

        $(document).ready(function(){
            quizID = Date.now();
            var sub = "<?php echo $subject;?>";
            var qNo = 1;
            $.ajax({   // ajax call to fetch the questions, write into a JSON file, fetch the first question from JSON file and display in HTML
                url: "fetchQuestion.php",
                type: "POST",
                data: { sub : sub},
                success: function(){
                    showNextQue(qNo);
                }, error: function(jqXHR, textStatus, errorThrown) {
                      console.log(jqXHR, textStatus, errorThrown);
                        alert("error in fetchQuestion.php - ajax call");
                    }
            });
        });
        
        
    function showNextQue(qNo){
        $.getJSON("quizSet.json", function(nextQue){
            JSONdata = nextQue;
            console.log('inside');
            console.log(qNo);
            console.log(JSONdata);
            $('#sNo').html(qNo);
            var index = qNo - 1;
            var quiz = nextQue.questionSet[index];
            $('#question').html(quiz['question']);
            
            //Set the labels for radio buttons
            $('#option1').html(quiz['opt1']);
            $('#option2').html(quiz['opt2']);
            $('#option3').html(quiz['opt3']);
            $('#option4').html(quiz['opt4']);
            
            //Set the values of radio buttons
            $('#opt1').val(quiz['opt1']);
            $('#opt2').val(quiz['opt2']);
            $('#opt3').val(quiz['opt3']);
            $('#opt4').val(quiz['opt4']);
            
        });
    };
    
        $('#quizForm').on('submit', function(){
            event.preventDefault();
            
            //get the value of selected radio button
            var selectedOption = $("input:radio[name='optans']:checked").val() ; 
            console.log('sel :'+selectedOption);
            var qNo = document.getElementById('sNo').innerHTML;
            var queID = JSONdata.questionSet[qNo-1]['questionID'];
            var corrAns = JSONdata.questionSet[qNo-1]['correctAns'];
            
            $.post(
                    '<?php echo basename($_SERVER['PHP_SELF']);?>',
                    { fnName: "insertAns", quiz_id: quizID, question_id: queID, user_answer: selectedOption, correct_answer: corrAns},
                    function(data) {
                        console.log(data);
                    }
                )
            $("input:radio[name='optans']").prop({checked:false});
            qNo++;
            if (qNo < 6) {   /// **********************need to change it to 15 questions before submit
                showNextQue(qNo);
            } else {
                qID = quizID;
                delete quizID;
                window.location.href = "results.php?quizID="+qID;
            } 
        });
        </script>



</html>
