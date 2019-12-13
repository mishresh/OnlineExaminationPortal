<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="..\css\register.css">
</head>
<body>
	<?php include 'index.php';?>
	<h1 align="center">Student Sign-Up</h1>
	<form action="register.php" style="border:1px solid #ccc">
		<div class="container">
			<hr>
			<label for="name"><b>Name</b></label>
			<input type="text" placeholder="Enter Name" name="name" required>
			
			<label for="reg_no"><b>Registration Number</b></label>
			<input type="text" placeholder="Enter Registration Number" name="reg_no" required>
			
			<label for="department"><b>Department</b></label>
			<input type="text" placeholder="Enter Department" name="Department" required>
			
			<label for="email"><b>Email </b></label><br>
			<input type="email" placeholder="Enter Email" name="email" required>

			<br>
			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<label for="psw-repeat"><b>Repeat Password</b></label>
			<input type="password" placeholder="Repeat Password" name="psw-repeat" required>

			<label>
			  <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
			</label>

			<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

			<div class="clearfix">
			  <button type="button" class="cancelbtn">Cancel</button>
			  <button type="submit" class="signupbtn">Sign Up</button>
			</div>
		</div>
	</form>
</body>
</html>