<?php  
session_start();
include('functions.php');
include('connection.php');

$getcode = $_GET['code'];


$sql = "SELECT `user_id` FROM `code` WHERE `code`= '$getcode' "; 
 $result1 = mysqli_query($con,$sql);
 $result2 = mysqli_fetch_assoc($result1);
 echo($result2);
 $sql1 = "SELECT * FROM `users` WHERE `user_id` = '$result2'";
 $result1 =  mysqli_query($con,$sql1);
 $app_data = mysqli_fetch_assoc($result1);


$app_id = $_GET['app_id'];
$app_secret = $_GET['app_secret'];
$code = $_GET['code'];

if (!$app_id) {
	echo "No App Id";


}
if (!$app_secret) {
	echo "No App Secret";
}
if (!$code) {
	echo('Wrong Code');
}

$user = $app_data['user_id'];
$sql = "SELECT `user_id` FROM `code` WHERE `user_id` = '$user'";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);

















?>