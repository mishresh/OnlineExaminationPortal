<?php
//admin login
require 'connect.php';
require 'index.php';

$id = $_POST['id'];
	$psw = md5($_POST['psw']);

$query = 'select id from admin where id = "'.$id.'" and password = "'.$psw.'"';
//echo $query;
$result = mysql_query($query);
$count = mysql_num_rows($result);

$sess = 'select * from admin where id = "'.$id.'" and password = "'.$psw.'"';

$flag = 0;
if($count >= 1)
{
	session_start();
	$result = mysql_query($sess);
	$d = mysql_fetch_assoc($result);
	$_SESSION['id'] = $id;
	$_SESSION['first_name'] = $d['first_name'];
	$_SESSION['last_name'] = $d['last_name'];
	$_SESSION['email'] = $d['email'];
	$flag = 1;
}

if($flag == 1)
{
	header('Location: adminhome.php');
}
else
{
	echo "<script>alert('Incorrect details! Try again.')</script>";
	header('admin.php');

}


?>