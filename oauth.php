<?php
session_start();
include('connection.php');
include('functions.php');

$user_data = check_login($con);
$user_id = $user_data['user_id'];

$code = app_length(16);
$ttt = '?code=';
$app_id = $_GET['app_id'];

$id = $app_id;
$sql =  "SELECT * FROM `table` WHERE  `app_id` = '$id'";


$result = mysqli_query($con, $sql);
$sql5 = "SELECT * FROM `status`  WHERE `user_id` = '$user_id'";
$rr = mysqli_query($con, $sql5);
$wwe = mysqli_fetch_assoc($rr);


while ($row = mysqli_fetch_assoc($result)) {

		
		
		
	
	if ($wwe['status'] == "YES") {
		$sql123 = "DELETE FROM `code` WHERE `user_id` = '$user_id'";
		mysqli_query($con, $sql123);

		$re_url = $row['re_url'];
		$query1 = "INSERT INTO `code`(`user_id`,`app_id`,`code`) VALUES ('$user_id','$app_id','$code')";
		$codesend = mysqli_query($con, $query1);
		header('location:' . $re_url . $ttt . $code . '&user_id=' . $user_id);
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {


		$auth = $_POST['auth'];
		$app_id = $app_id;
		$re_url = $row['re_url'];
		$user_id = $user_data['user_id'];
		$sql123 = "DELETE FROM `code` WHERE `user_id` = $user_id;";
		$query = "INSERT INTO `status`( `status` , `app_id`, `re_url`, `user_id`) VALUES ('$auth','$app_id','$re_url','$user_id')";

		mysqli_query($con, $query);
		mysqli_query($con, $sql123);



		$query1 = "INSERT INTO `code`(`user_id`,`app_id`,`code`) VALUES ('$user_id','$app_id','$code')";
		$codesend = mysqli_query($con, $query1);


		header('location:' . $re_url . $ttt . $code . '&user_id=' . $user_id);
	} else {

		header('outh.php?' . $app_id);
	}

	$user_data = check_login($con);

	?><!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://localhost/w3.css/w3.css">
		<title class="w3-red">App Oauth</title>
	</head>
	<header class="w3-container w3-teal">

		<img src="" class="w3-round">
		<h1 class="w3-left">Authentication Page</h1>
		<li class="w3-dropdown-hover">
			<br>
			<a href="#" class="w3-btn">Options</a>
			<div class="w3-dropdown-content w3-white w3-card-4">
				<a href="./index.php">Home</a>
				<a href="./upload/">Upload</a>
				<a href="./profile.php">Profile</a>
			</div>
		</li>
	</header>

	<body class="">
		<div class="w3-center w3-card-12  w3-hover-shadow w3-hoverable ">
			<h2 class="w3-center">Would You Like To Authenticate</h>
				<div class="w3-container ">
					<h2><?php echo $row['name']; ?></h2>
				</div>


				<div class="w3-center w3-container w3-pale-red w3-leftbar w3-border-blue w3-border-box ">
					<label class="w3-border w3-leftbar w3-pale-green" for="p">Description</label>
					<p><?php echo $row['des']; ?></p>
				</div>
		</div>
	<?php  ?>
	<div class="w3-container w3-center w3-round-xlarge">
		<form method="POST">
			<input type="hidden" name="auth" value="YES">
			<button class="w3-btn w3-green">Accept</button>
			<a href="./index.php" class="w3-btn w3-red">Decline</a>
		</form>
	</div>

	</body>

	</html>

	<?php

	
}



?>
	