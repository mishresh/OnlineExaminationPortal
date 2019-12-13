<?php

require 'connect.php';

$sub_id = $_POST["subject_code"];
$sub_name = $_POST["subject_name"];

$insert_sub = 'INSERT INTO `subject` (`sub_id`, `sub_name`) VALUES ("'.$sub_id.'", "'.$sub_name.'")';
mysql_query($insert_sub);

?>