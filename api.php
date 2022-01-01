<?php
session_start();
include('connection.php');
include('functions.php');

$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$app_name = $_POST['name'];
	$url = $_POST['url'];
	$re_url = $_POST['end'];
	$des = $_POST['res'];

	if (!empty($app_name) && !empty($url) && !is_numeric($re_name)) {

		$str = rand();
		$str1 = rand(1,9999999);
		$app_id = $result = md5($str);
         
		$app_secret = $result = md5($str1);
		$user_id = $user_data['user_id'];
		$query = "INSERT INTO `table` (`user_id`, `name`, `url`, `re_url`, `app_id`,`secret`,`des`) VALUES ('$user_id', '$app_name', '$url', '$re_url','$app_id','$app_secret','$des')";

		mysqli_query($con, $query);

		header("Location: applist.php");
		die;
	} else {
		echo "This Information Is Not Vald";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Api Launch </title>
	<style type="text/css">
		#text {

			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {

			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
		}

		#box {

			background-color: #ba68c8;
			margin: auto;
			margin-top: 60px;
			width: 300px;
			padding: 20px;
			border-radius: 14px;
			
		}

		body {
			background-color: #4db6ac;
			background-repeat: no-repeat;
			background-size: cover;
		}

		.bo {
			background-color: blueviolet;
			size: 700px;
			padding: 60px;
		}

		.bo:hover {
			background-color: white;
			opacity: 10;
		}
		.bo::placeholder{
			color: #ba68c8;
		}
	</style>
</head>

<body>
	<div id="box">
		<form action="?" method="POST">
			<div>
				<label>App Name</label>
				<input type="text" name="name" class="box" placeholder="App Name" id="text">
			</div><br>

			<div>
				<label>Url</label>
				<input type="Url" name="url" placeholder="App Url" id="text">
			</div><br>
			<div>
				<label>Redirect Url</label>
				<input type="url" name="end" placeholder="Redirect url" class="box" id="text">
			</div><br>
			<div>
				<label>Description</label>
				<input type="text" name="res" class="bo" placeholder="Description" autocomplete="off">
			</div><br>
			<button id="button">Submit</button>

		</form>
	</div>

</body>

</html>