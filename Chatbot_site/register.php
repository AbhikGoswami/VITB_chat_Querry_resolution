<?php
	require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>7 Inc. Register</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">

</script>
</head>
<body bgcolor="#191919">

	

	<h5 align="right" style="color:#f7b32d">
		<a href="index.php" style="text-decoration:none; color:#f7b32d"> HOME </a> &nbsp; | &nbsp; 
	
		<a href="index.php" style="text-decoration:none; color:#f7b32d"> LOGIN </a> &nbsp;
	</h5>
	
	<form class="myform" action="register.php" method="post" enctype="multipart/form-data" >
		<div id="main-wrapper">
		<center>
			<h2>User Registration</h2>
			
		</center>
		
			<label><b>Full Name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Email:</b></label><br>
			<input name="email" type="email" class="inputvalues" placeholder="Type your email" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back To Login"/></a>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				
				$fullname = $_POST['fullname'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				
		
				if($password==$cpassword)
				{
					
					$query= "select * from users WHERE registration_number='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
			
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					
					else
					{
						 	
						$query= "insert into users values('','$username','$password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
				}
				else
				{
					echo '<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';	
				}
			}
		?>
	</div>
	
</body>
</html>