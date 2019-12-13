<?php
require "connect.php";
session_start();
if(empty($_SESSION))
{
  header('location:index.php');
}

$select_subjects = "SELECT * from subject";

$result = mysql_query($select_subjects);

?>


<!DOCTYPE html>
 <html>
  <head>
   <title> Home Page </title>
   <link rel="stylesheet" type="text/css" href="../css/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
</style>

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
</div>
<br><div  style="padding-left:100px; padding-right:100px">

<div style="color:black ;border-radius: 20px; padding: 0px 0px 0px 0px;background-color:white;opacity: 0.8; ">
   <center><h2>ADD QUESTIONS </h2></center>
  </div></div>
  
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<form action="upload.php" method="post" enctype="multipart/form-data">
  <table class="table table-striped">
    <tr>
      <td width="24%" height="32"><div align="left"><strong>Select Subject</strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32">
        
          <?php
          echo '<select class="form-control" name="sub_name">';
            while($row = mysql_fetch_assoc($result) )
            {
              $sub_id = $row['sub_id'];
              $sub_name = $row['sub_name'];
              echo "<option value=".$sub_id.">".$sub_name."</option>";
            }
            echo '</select>';
          ?>
      
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
        <td>&nbsp;</td>
      <td><textarea class="form-control" name="addque" cols="60" rows="2" id="addque"></textarea></td>
    </tr>


    <tr>
      <td height="26"><div align="left"><strong>
         Select image to upload:
          </strong>
        </div>
      </td>
      <td>
        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
      </td>
    </tr>

    <tr>
      <td height="26"><div align="left"><strong>Enter Option A </strong></div></td>
      <td>&nbsp;</td>
      <td><input class="form-control" name="op1" type="text" id="ans1" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Option B </strong></td>
      <td>&nbsp;</td>
      <td><input class="form-control" name="op2" type="text" id="ans2" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Option C </strong></td>
      <td>&nbsp;</td>
      <td><input class="form-control" name="op3" type="text" id="ans3" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Option D </strong></td>
      <td>&nbsp;</td>
      <td><input class="form-control" name="op4" type="text" id="ans4" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Correct Option (a/b/c/d)</strong></td>
      <td>&nbsp;</td>
      <td><input class="form-control" name="correct" type="text" id="ans4" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>

</div>

  </body>
 </html>
