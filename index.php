<?php 
session_start();

	include("connection.php");
	include("functions.php");
 
	
	if (isset($_GET['user_id'])) {
		

		
	}else{
		$user_data = check_login($con);
	}
   

?>

<!DOCTYPE html>
<html>
<head>
	<title>Api  website</title>
	<link rel="stylesheet" type="text/css" href="index.css">
  <link rel="icon" type="icon" href="hi.ico">
</head>
<body>

	<br>
	<div class="nav">
		<ul>
			<li><a href="userpage.php"> Files</a></li>
			<li><a href="mail.php">Any Problems</a></li>
			<li><a href="update.php">Password Change</a></li>
			<li><a href="./upload/">Upload A Report</a></li>
			<li><a href="logout.php", id="hi">Logout</a></li>
			<li><a href="./api.php">Api</a></li>
			<li><a href="./applist.php">Apps</a></li>
		</ul>
	</div><br>
	


	<br><br><br><br><h1>	Hello,<?php echo $user_data['user_name'];  ?></h1>
	
	
	<h2>Welcome To Star Force</h2>

	
	
</body>
</html>