<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
			
   
	header("Location: login.php");

	 die("<script>alert('Connection Failed.')</script>");
    
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 9;
	}

	$len = rand(9,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}


function app_length($length)
{

	$text = "";
	if($length < 16)
	{
		$length = 16;
	}

	$len = rand(16,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}


