<?php
	session_start();
	require 'config.php';
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<h2>Welcome to VIT-Bhopal chat help</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		
	</div>
	<div class="form-container sign-in-container">
		
			<form class="myform" action="index.php" method="post">
			<h3>Sign in</h3>
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
		    </form>
			
		
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome!</h1>
				
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details</p>
				
			</div>
		</div>
	</div>
</div>


</html>


		<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="select * from users WHERE registration_number='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				$row = mysqli_fetch_assoc($query_run);
				$_SESSION['username']= $row['username'];
				$_SESSION['imglink']= $row['imglink'];
				header('location:homepage.php');
			}
			else
			{
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>
		
	</div>
		
</body>
</html>