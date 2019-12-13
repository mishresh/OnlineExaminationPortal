<?php
require "connect.php";
session_start();
if(empty($_SESSION))
{
  header('location:index.php');
}
require "connect.php";
session_start();

$qn = $_SESSION['qn'];
$resp = $_POST['response'];

	$quiz = 'select * from question, createdquiz  where createdquiz.quiz_id="'.$_SESSION['quiz_id'].'" and question.id = createdquiz.que_no';
	$result = mysql_query($quiz);
		if(!($result))
	{
		echo mysql_error();
	}
		$ques = array(array());
		while($row = mysql_fetch_assoc($result))
		{
			array_push($ques, $row);
		}
		$num_of_ques = mysql_num_rows($result);

		$update = 'UPDATE `response` SET `ans`= "'.$resp.'" WHERE user_id = "'.$_SESSION["reg_no"].'" and quiz_id = "'.$_SESSION["quiz_id"].'" and que_id = "'.$ques[$qn]['id'].'"';

$_SESSION['qn'] = $_SESSION['qn'] + 1;

if(mysql_query($update))
{
	echo "<script>alert('answer for question ".$qn." saved')</script>";
	header("location:ask.php");
}

?>