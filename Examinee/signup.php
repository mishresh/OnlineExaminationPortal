<!DOCTYPE html>
 <html>
  <head>
<title>New user signup </title>

<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script language="javascript">
function check()
{

 if(document.form1.lid.value=="")
  {
    alert("Plese Enter Login Id");
  document.form1.lid.focus();
  return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
  document.form1.pass.focus();
  return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
  document.form1.cpass.focus();
  return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
  document.form1.cpass.focus();
  return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Plese Enter Your Name");
  document.form1.name.focus();
  return false;
  }
  if(document.form1.address.value=="")
  {
    alert("Plese Enter Address");
  document.form1.address.focus();
  return false;
  }
  if(document.form1.city.value=="")
  {
    alert("Plese Enter City Name");
  document.form1.city.focus();
  return false;
  }
  if(document.form1.email.value=="")
  {
    alert("Plese Enter your Email Address");
  document.form1.email.focus();
  return false;
  }
  e=document.form1.email.value;
    f1=e.indexOf('@');
    f2=e.indexOf('@',f1+1);
    e1=e.indexOf('.');
    e2=e.indexOf('.',e1+1);
    n=e.length;

    if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
    {
      alert("Please Enter valid Email");
      document.form1.email.focus();
      return false;
    }
  return true;
  }
  
</script>
<script>
 function validation1(){
var username1=document.getElementById('phone').value;
var mobilepattern=/^[6789][0-9]{9}$/;
if(mobilepattern.test(username1)){
document.getElementById('phone').style.backgroundColor='Green';
}else{
document.getElementById('phone').style.backgroundColor='red';
}
}
 </script
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-success">


<table style="background-color:#FFFFFF;width:100%;opacity:.9;"><tr><td>
   <div id="full">
   <a name="top"> </a>
   <table style="width:100%; hight:150px;">
   <tr><td>
   <div style=""><img src="image/11.PNG" height="150" width="125"/></div></td><td><div style="font-size:40px;">
   <b>Computer &nbsp;&nbsp;Science &nbsp;&nbsp;&amp;&nbsp;&nbsp; Engineering&nbsp;&nbsp; Department(CSED)</b>
   </br><i>Motilal Nehru National Institute of Technology Allahabad</i></div>
   </td></tr>
   </table>
<div class="parallax">
<div class="navbar">
  <a href="home.php">Home</a>
  <a href="#">About</a>
  <a href="adminlogin.php" class="right">Admin Login </a>
</div>




 <table width="100%" border="0">
   <tr>
     <td width="132" rowspan="2" valign="top"><span class="style8"></span></td>
     <h1 class="text-center bg-primary">REGISTRATION PAGE</h1>
   <h3>
   <a href="index.php">BACK</a>
   </h3>
   
   </tr>
   <tr>
     <td><form name="form1" method="post" action="signupuser.php" onSubmit="return check();">
      <br>
      <table class=" table table-striped">
    
         <tr>
           <td class="style7">LOGIN ID</div></td>
           <td><input class="form-control"type="text" name="lid"></td>
         </tr>
         <tr>
           <td class="style7">Password</td>
           <td><input class="form-control"type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

    </td>
         </tr>
         <tr>
           <td class="style7" >Confirm Password </td>
           <td><input class="form-control" name="cpass" type="password" id="cpass"></td>
         </tr>
         <tr>
           <td class="style7">Name</td>
           <td><input class="form-control" name="name" type="text" id="name"></td>
         </tr>
         <tr>
           <td valign="top" class="style7">Address</td>
           <td><textarea class="form-control" name="address" id="address"></textarea></td>
         </tr>
         <tr>
           <td valign="top" class="style7">City</td>
           <td><input class="form-control" name="city" type="text" id="city"></td>
         </tr>
         <tr>
           <td valign="top" class="style7">Phone</td>
       
           <td><input class="form-control" name="phone" type="number" id="phone"  id='phone' onkeyup="validation1()" required></td>
         </tr>
         <tr>
           <td valign="top" class="style7">E-mail</td>
           <td><input class="form-control" name="email" type="text" id="email"></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><input class="btn btn-danger" type="submit" name="Submit" value="Register">
           </td>
         </tr>
       </table>
     </form></td>
   </tr>
 </table>
 <p>&nbsp; </p>

  </body>
 </html>
