<?php
require "connect.php";
session_start();
if(empty($_SESSION))
{
  header('location:index.php');
}
?>




<!DOCTYPE html>
 <html>
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
  <a href="home.php">Home</a>
  <a href="subject.php">Add Subjects</a>
  <a href="questions.php">Questions</a>
  <a href="addquestions.php">Add Questions</a>
  <a href="addquiz.php">Add Quiz</a>
  <a href="result.php">Result</a>
  <a href="feedback.php">Feedback</a>
  <a href="logout.php" class="right">Logout </a>
  <!-- <a href="adminlogin.php" class="right">Admin Login </a> -->
</div>
<br><div  style="padding-left:100px; padding-right:100px">

<div style="color:black ;border-radius: 20px; padding: 0px 0px 0px 0px;background-color:white;opacity: 0.8; ">
<!-- <div style="padding-center:0px; padding-left:50px; color: MidnightBlue; font-size: 20px; text-shadow: -1px 0 black, 0 1px OrangeRed, 1px 0 gold, 0 -1px red;">
 -->   <center><h2>UPLOADED QUESTIONS </h2></center>
  </div></div>

   <table class="blueTable">
<thead>

<tr>
<th><a href="#">Question Id</a></th>
<th><a href="#">Subject ID</a></th>
<th><a href="#">Question</a></th>
<th><a href="#">Question</a></th>
<th><a href="#">Options</a></th>
</tr>


<?php

$questions = "SELECT * FROM question";

$result = mysql_query($questions);

while($row = mysql_fetch_assoc($result))
{
  echo '<tr>';

  echo '<td>'.$row["id"].'</td>';
  echo '<td>'.$row["sub_id"].'</td>';
  echo '<td>'.$row["text_question"].'</td>';
  echo '<td><img src="'.$row["img_question"].'" width=400 height=250></td>';
  echo '<td><ol start="a">';
  echo '<li>'.$row["op_a"].'</li>';
  echo '<li>'.$row["op_b"].'</li>';
  echo '<li>'.$row["op_c"].'</li>';
  echo '<li>'.$row["op_d"].'</li>';
  echo '</td>';

  echo '</tr>';
}

?>


</thead>
  </div></div>

</div>

  </body>
 </html>
