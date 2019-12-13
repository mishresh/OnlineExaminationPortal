<?php

require 'connect.php';
require 'index.php';

	$reg_no = $_POST['reg_no'];
	$password = md5($_POST['password']);

$query = 'select reg_no from examinee where reg_no = "'.$reg_no.'" and password = "'.$password.'"';
//echo $query;
$result = mysql_query($query);
$count = mysql_num_rows($result);

$sess = 'select * from examinee where reg_no = "'.$reg_no.'" and password = "'.$password.'"';

$flag = 0;
if($count >= 1)
{
	session_start();
	$result = mysql_query($sess);
	$d = mysql_fetch_assoc($result);
	$_SESSION['reg_no'] = $reg_no;
	$_SESSION['first_name'] = $d['first_name'];
	$_SESSION['last_name'] = $d['last_name'];
	$_SESSION['examinee_id'] = $d['id'];
	$_SESSION['email'] = $d['email'];
	$_SESSION['sub_id'] = $d['sub_id'];
	$flag = 1;
}

if($flag == 1)
{
	header('Location: all_quizes.php');
}
else
{
	echo "<script>alert('Incorrect details! Try again.')</script>";
	header('index.php');

}

?>
