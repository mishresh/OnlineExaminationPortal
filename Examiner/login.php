<?php
//examiner login
require 'connect.php';
require 'index.php';

	$emp_id = $_POST['emp_id'];
	$psw = md5($_POST['psw']);

$query = 'select emp_id from examiner where emp_id = "'.$emp_id.'" and password = "'.$psw.'"';
//echo $query;
$result = mysql_query($query);
$count = mysql_num_rows($result);

$sess = 'select * from examiner where emp_id = "'.$emp_id.'" and password = "'.$psw.'"';

$flag = 0;
if($count >= 1)
{
	session_start();
	$result = mysql_query($sess);
	$d = mysql_fetch_assoc($result);
	$_SESSION['emp_id'] = $emp_id;
	$_SESSION['first_name'] = $d['first_name'];
	$_SESSION['last_name'] = $d['last_name'];
	$_SESSION['examiner_id'] = $d['id'];
	$flag = 1;
}

if($flag == 1)
{
	header('Location: home.php');
}
else
{
	echo "<script>alert('Incorrect details! Try again.')</script>";
	header('index.php');

}

?>