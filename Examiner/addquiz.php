<?php
require "connect.php";
session_start();
if(empty($_SESSION))
{
  header('location:index.php');
}
$name="";
$time="";
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
<form action="#" method="post">
   <table class="blueTable">
<thead>

<tr>
<th><a>Select Question</a></th>
<th><a>Subject ID</a></th>
<th><a>Question</a></th>
<th><a>Question</a></th>
<th><a>Options</a></th>
</tr>


<form action="addquiz.php">
  Select a time:
  <select name="time" value="<?php echo $time; ?>" width="200px" required >
  <option value="15">15</option>
  <option value="20">20</option>
  <option value="30">30</option>
  <option value="60">60</option>
</select>
<br>
Quiz name: <input type="text" name="name" value="<?php echo $name; ?>" placeholder="QUIZ _" required><br>

</form>

<?php

$questions = "SELECT * FROM question";

$result = mysql_query($questions);

while($row = mysql_fetch_assoc($result))
{
  echo '<tr>';
  //echo 'test';
  echo '<td>'.'<input type="checkbox" name="check_list[]"
   value='.$row["id"].' />'.'</td>';
  //echo '<td>'.$row["id"].'</td>';
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
</table><br>
  <input type="submit" name="submit" value="Submit"/>
  <br>
  <br>
</form>

<?php
$flag = 0;
if(isset($_POST['submit'])){//to run PHP script on submit

if(!empty($_POST['check_list'])){


      $count_query = mysql_query("select quiz_id from createdquiz where quiz_id = (select max(quiz_id) from createdquiz)") or die(mysql_error());


if ($row = mysql_fetch_array($count_query))
    {
      $count_old= $row['quiz_id'];
    }
    $count_new = $count_old + 1;
    $id =  $count_new; 
    $name =  $_POST['name'];
    $time =  $_POST['time'];

// echo  $count_old;
// echo $count_new;
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
// echo $selected."</br>";


          $student_query = "INSERT INTO `createdquiz`(`quiz_id`, `que_no`, `name`, `time`) VALUES ('$id','$selected','$name','$time')"; 
          if(mysql_query($student_query))
          {
            $flag = 1;
          }
          else
          {
            echo mysql_error();
          }
          


}
}
}
if($flag == 1)
{
  echo '<script>alert("New Quiz named '.$name.' created.")</script>';

}
?>



  </body>
 </html>
