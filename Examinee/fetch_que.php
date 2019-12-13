<?php

require "connect.php";
session_start();
if(empty($_SESSION))
{
  header('location:index.php');
}
		$questions = "SELECT * FROM question";
		//$questions = "SELECT question.id,question.op_a,question.op_b,question.op_c,question.op_d,question.img_question,question.text_question,question.examiner_id,question.sub_id FROM question, createdquiz WHERE createdquiz.name="QUIZ 1" AND createdquiz.que_no=question.id";
		$result = mysql_query($questions);
		$ques = array(array());
		while($row = mysql_fetch_assoc($result))
		{
			$img = $row["img_question"];
			array_push($ques, $row);
			echo mysql_error();
		}
		$num_of_ques = mysql_num_rows($result);
		echo json_encode($ques);

?>
