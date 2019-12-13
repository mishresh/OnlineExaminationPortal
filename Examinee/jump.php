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
	<title></title>
</head>
<body style="border:solid green 5px;">

	<?php
		
	?>

</body>
</html>