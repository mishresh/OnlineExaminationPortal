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
  <a href="adminhome.php">Home</a>
  <a href="addexaminer.php">Add Examiner</a>
  <a href="#">About</a>
  <a href="logout.php" class="right">Logout </a>
  <!-- <a href="adminlogin.php" class="right">Admin Login </a> -->
</div>
<br><div  style="padding-left:100px; padding-right:100px">

<div style="color:black ;border-radius: 20px; padding: 0px 0px 0px 0px;background-color:white;opacity: 0.8; ">
<!-- <div style="padding-center:0px; padding-left:50px; color: MidnightBlue; font-size: 20px; text-shadow: -1px 0 black, 0 1px OrangeRed, 1px 0 gold, 0 -1px red;">
 -->  
  

  <center><h2>WELCOME  
    <?php
session_start();
echo $_SESSION["first_name"]." ".$_SESSION["last_name"];
?>
</h2></center>

  </div></div>
  
   
 
  </body>
 </html>
