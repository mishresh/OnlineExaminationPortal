<?php

require "connect.php";
require "addexaminer.php";
$flag = 0;

if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $emp_id = $_POST['emp_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $error = "";
    if ($password_1 === $password_2) {
      $password = md5($password_1);
    }
    else
    {
      echo "<script>alert(Passwords do not match.)</script>";
      $error = "Passwords do not match.";
      die();
    }
    $query = 'INSERT INTO `examiner`( `emp_id`, `first_name`, `last_name`, `password`) 
            VALUES("'.$emp_id.'", "'.$fname.'", "'.$lname.'", "'.$password.'")';
            if(mysql_query($query))
            {
              echo "<script>alert('New Examiner Details Inserted')</script>";
            }
            else
            {
              echo "<script>alert('";
              echo mysql_error();
              echo "')</script>";
              $error = mysql_error();
            }
    }

    if($error != "")
    {
      echo "<script>alert('".$error."')</script>";
    }

?>