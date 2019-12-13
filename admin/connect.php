<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';

#@mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Could not connect to the database.");

if(!@mysql_connect($mysql_host, $mysql_user, $mysql_password))
{
	die("Could not connect to the database.");
}
else
{
	@mysql_select_db('OnlineExaminationPortal');
}

?>