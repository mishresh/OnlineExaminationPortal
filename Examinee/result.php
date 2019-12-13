
<head>
   <title> Home Page </title>
   <link rel="stylesheet" type="text/css" href="../css/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

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
<div class="parallax">
<div class="navbar">
  <a href="logout.php" class="right">Logout </a>
  <!-- <a href="adminlogin.php" class="right">Admin Login </a> -->
</div>
<br><div  style="padding-left:100px; padding-right:100px">

<div style="color:black ;border-radius: 20px; padding: 0px 0px 0px 0px;background-color:white;opacity: 0.8; ">
<!-- <div style="padding-center:0px; padding-left:50px; color: MidnightBlue; font-size: 20px; text-shadow: -1px 0 black, 0 1px OrangeRed, 1px 0 gold, 0 -1px red;">


 -->   <center><h3>

<?php
	require "connect.php";
	session_start();
	echo $_SESSION["first_name"]." ".$_SESSION["last_name"];

	echo ", You have sucessfully completed the quiz.<h3>";
	
	$qn = $_SESSION["qn"];
	$correct = 'select correct_op from question, createdquiz  where createdquiz.quiz_id="'.$_SESSION['quiz_id'].'" and question.id = createdquiz.que_no';
	$right = mysql_query($correct);

	$num_of_ques = mysql_num_rows($right);

	$resp = 'select ans from response where user_id = "'.$_SESSION["reg_no"].'" and quiz_id = "'.$_SESSION["quiz_id"].'"';

	$to_check = mysql_query($resp);

	$solution = array();
	$response = array();

	while($row = mysql_fetch_assoc($right))
	{
		array_push($solution, $row);
	}
	while($row = mysql_fetch_assoc($to_check))
	{
		array_push($response, $row);
	}
	//<center>
	echo "<h1>THANK YOU !!!</h1>";
	//<br>
	echo "<h2>HAVE A NICE DAY</h2>";
	// echo "<h1>Solution</h1>";
	// print_r($solution);
	// echo "<h1>Response</h1>";
	// print_r($response);

	$i = 1;
	$marks = 0;
	$total = $num_of_ques;
	while($i < $num_of_ques)
	{
		if($solution[$i]['correct_op'] == $response[$i]['ans'])
		{
			$marks = $marks + 1;
		}
		$i = $i + 1;
	}

	echo "<h1>Marks Obtained</h1>";
	echo $marks;
	echo "<h1>Out Of</h1>";
	echo $total;
//</center>
	$insert = 'INSERT INTO `result`(`reg_no`, `quiz_id`, `max_marks`, `marks_obtained`) VALUES ("'.$_SESSION["reg_no"].'", '.$_SESSION["quiz_id"].', '.$total.', '.$marks.')';
	if(!mysql_query($insert))
		{
			echo mysql_error();
		}
?>
