<?php  
session_start();
include('connection.php');
include('functions.php');

$user_data = check_login($con);
$user_id = $user_data['user_id'];

$code = app_length(16);
$ttt = '?code=';
$app_id = $_GET['appid'];

$id = $app_id;
$sql =  "SELECT * FROM `table` WHERE  `app_id` = '$id'";


$result = mysqli_query($con , $sql);
$sql5 = "SELECT * FROM `status`  WHERE `user_id` = '$user_id'";
$rr = mysqli_query($con, $sql5);
$wwe = mysqli_fetch_assoc($rr);


while ($row = mysqli_fetch_assoc($result) ) {
if ($wwe['status'] == "YES") {
	
		$re_url = $row['re_url'];
		$query1 = "INSERT INTO `code`(`user_id`,`app_id`,`code`) VALUES ('$user_id','$app_id','$code')";
		$codesend = mysqli_query($con, $query1);
		header('location:' . $re_url . $ttt . $code . '&user_id=' . $user_id);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	

	$auth =$_POST['auth'];
	$app_id = $app_id;
	$re_url = $row['re_url'];
	$user_id = $user_data['user_id'];
  $sql123 = "DELETE FROM `code` WHERE `user_id` = $user_id;";
	$query = "INSERT INTO `status`( `status` , `app_id`, `re_url`, `user_id`) VALUES ('$auth','$app_id','$re_url','$user_id')";
    
     mysqli_query($con,$query);
     mysqli_query($con,$sql123);
     
     
     
     $query1 = "INSERT INTO `code`(`user_id`,`app_id`,`code`) VALUES ('$user_id','$app_id','$code')";
     $codesend = mysqli_query($con,$query1);
      

      header('location:'.$re_url.$ttt.$code.'&user_id='.$user_id);


}     
else{
  
  header('outh.php?'.$app_id);
}

$user_data = check_login($con);

if (isset( $_GET['secret'])) {
	$getcode = $_GET['code'];
	
 $sql = "SELECT `user_id` FROM `code` WHERE `code`= '$getcode' ;"; 
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_assoc($result);
 $sql1 = "SELECT * FROM `users` WHERE `user_id` = '$row';";
 $result1 =  mysqli_query($con,$sql1);
 $user_data = mysqli_fetch_assoc($result1);
 return $user_data;

  


}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App Oauth</title>
</head>
<body>
	<div class="auth">
		<h1>Would You Like To Authenticate</h1>
		<h2><?php echo $row['name'] ;?></h2>
		<label>Description</label>
		<p><?php echo $row['des'];?></p>
	</div>
<?php }?>
    <div>
    	<form method="POST">
    		<input type="hidden" name="auth" value="YES">
    		<button>Authenticate</button>
    	</form>
    </div>

</body>
</html>