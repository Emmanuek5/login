<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email =$_POST['email'];
     $sql = "SELECT `user_name` FROM `users` WHERE `user_name` = $user_name;";
     $result = mysqli_query($con,$sql);




     if ($result && mysqli_num_rows($result) < 0 ) {
     	echo('User NAME Is Taken');
     }else
     if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(9);
			$query = "INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`) VALUES ('$user_id', '$user_name', '$password', '$email')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}

		
	}
	 
	 
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	body{
		background-color: red;
		background-repeat: no-repeat;
	   background-size: cover;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<label>Username</label>
			<input id="text" type="text" name="user_name" placeholder="Username"><br><br>
			<label>Password</label>
			<input id="text" type="password" name="password" placeholder="Password"><br>
			<label>Email</label>
			<input type="email" name="email" id="text" placeholder="Email">

			<br>

			<br><input id="button" type="submit" value="Signup"><br>
<p>Already have an Account.<a href="login.php">Click to Login</a></p><br><br>
		</form>
	</div>
</body>
</html>