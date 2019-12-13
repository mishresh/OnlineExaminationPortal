<?php
require "connect.php";
session_start();
if(empty($_SESSION))
{
  header('location:logout.php');
  die();
}
	$qn = $_SESSION["qn"];
	if(isset($_POST['selected_quiz']))
	{
		$_SESSION['quiz_id'] = $_POST["selected_quiz"];
	}
	$query = 'select * from response where user_id ="'.$_SESSION["reg_no"].'" and quiz_id = "'.$_SESSION['quiz_id'].'"';
	$result = mysql_query($query);
	$quiz_taken = mysql_num_rows($result);

	$q = 'select distinct(name) from createdquiz where quiz_id='.$_SESSION['quiz_id'];
	$result = mysql_query($q);

	if(!($result))
	{
		echo mysql_error();
		header("location:all_quizes.php");
		
	}
	$row = mysql_fetch_assoc($result);
	$_SESSION['quiz_name'] = $row['name'];
	if($quiz_taken >= 1)
	{
		$_SESSION['error_msg'] = 'You have already taken quiz named '.$_SESSION['quiz_name'];
		header("location:all_quizes.php");
		die();
	}
	
	

	$quiz = 'select * from question, createdquiz  where createdquiz.quiz_id="'.$_SESSION['quiz_id'].'" and question.id = createdquiz.que_no';
	$result = mysql_query($quiz);
	if(!($result))
	{
		echo mysql_error();
		
	}
		$ques = array(array());
		while($row = mysql_fetch_assoc($result))
		{
			$img = $row["img_question"];
			array_push($ques, $row);
		}
		$num_of_ques = mysql_num_rows($result);


		$qnum = $qn;
	if($qn == 1)
	{
		$i = 1;
		$resp = "";
		while($i <= $num_of_ques)
		{
			$insert = 'INSERT INTO `response`(`user_id`, `quiz_id`, `que_id`, `ans`) VALUES ("'.$_SESSION["reg_no"].'", "'.$_SESSION["quiz_id"].'", "'.$ques[$qnum]['id'].'", "'.$resp.'")';
			mysql_query($insert);
			$i = $i + 1;
			$qnum = $qnum + 1;
		}
	}
		$_SESSION['time'] = $ques[$qn]['time'];


?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body style="border: solid green 5px;">

<div class="container" >
<div id="quiz_name" style="padding: 0; display: inline;">
	<b><?php echo $_SESSION['quiz_name'];?></b><b style="color: red;"><?php include "time.php"?> No of Questions: <?php echo $num_of_ques?></b>
</div>

<iframe src="jump.php" id="jump" style="width: 100%; height: 10vh"></iframe>
<iframe src="ask.php" id="ask" style="width: 100%; height: 90vh"></iframe>


</body>
</html>
