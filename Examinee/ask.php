<?php

require "connect.php";
session_start();

if(empty($_SESSION))
{
  header('location:logout.php');
}
	$qn = $_SESSION["qn"];
	if(isset($_POST['selected_quiz']))
	{
		$_SESSION['quiz_id'] = $_POST["selected_quiz"];
	}
	$q = 'select distinct(name) from createdquiz where quiz_id='.$_SESSION['quiz_id'];
	$result = mysql_query($q);
	$row = mysql_fetch_assoc($result);
	$_SESSION['quiz_name'] = $row['name'];

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
	if($qn > $num_of_ques)
	{
		header("location:result.php");
	}

?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form action="save_ans.php" method="post" id="show_que">
<div id="question" style="background-color: peach;">
	<span style="display: inline;">
		<h5 id="que_no"><?php echo $_SESSION['qn']; ?></h5>
		<h5 id="textque"><?php echo $ques[$qn]["text_question"]; ?></h5>
	</span>
	<?php
	echo '<img id="myImg" src="'.$ques[$qn]['img_question'].'" width="550" height="260"><br>';
	echo '<input type="radio" name="response" value=1><b>'.$ques[$qn]['op_a'].'</b><br>';
	echo '<input type="radio" name="response" value=2><b>'.$ques[$qn]['op_b'].'</b><br>';
	echo '<input type="radio" name="response" value=3><b>'.$ques[$qn]['op_c'].'</b><br>';
	echo '<input type="radio" name="response" value=4><b>'.$ques[$qn]['op_d'].'</b><br>';
	?>
	<div id="options">

	</div>
</div>
</form>
</form>
<button form="show_que" id="snn" name="snn" type="submit"><?php if($_SESSION['qn'] == $num_of_ques) echo "Save and End"; else echo "Save and Next"?></button><br>
<input onclick="" type="button" id="submit"  value="Submit Answers">

</div>
</body>
</html>
