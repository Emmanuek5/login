<?php  
session_start();
include('connection.php');
include('functions.php');

$user_data = check_login($con);
$id = $user_data['user_id'];
$sql =  "SELECT * FROM `table` WHERE  `user_id` = $id;";

$result = mysqli_query($con , $sql);




	



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>App list</title>
	<style type="text/css">
		
		
		@import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');
*{
 margin:0;
 padding: 0;
 outline: 0;
}
.filter{
 position: absolute;
 left: 0;
 top: 0;
 bottom: 0;
 right: 0;
 z-index: 1;
 background: rgb(233,76,161);
background: -moz-linear-gradient(90deg, rgba(233,76,161,1) 0%, rgba(199,74,233,1) 100%);
background: -webkit-linear-gradient(90deg, rgba(233,76,161,1) 0%, rgba(199,74,233,1) 100%);
background: linear-gradient(90deg, rgba(233,76,161,1) 0%, rgba(199,74,233,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e94ca1",endColorstr="#c74ae9",GradientType=1);
opacity: .7;
}
table{
 position: absolute;
 z-index: 2;
 left: 50%;
 top: 50%;
 transform: translate(-50%,-50%);
 width: 60%; 
 border-collapse: collapse;
 border-spacing: 0;
 box-shadow: 0 2px 15px rgba(64,64,64,.7);
 border-radius: 12px 12px 0 0;
 overflow: hidden;

}
td , th{
 padding: 15px 20px;
 text-align: center;
 

}
th{
 background-color: #ba68c8;
 color: #fafafa;
 font-family: 'Open Sans',Sans-serif;
 font-weight: 200;
 text-transform: uppercase;

}
tr{
 width: 100%;
 background-color: #fafafa;
 font-family: 'Montserrat', sans-serif;
}
tr:nth-child(even){
 background-color: #eeeeee;
}
	</style>
</head>
<body>
	<table >
		<tr>
			<th>App Name</th>
			<th>App Id</th>
			<th>App Secret</th>
			<th>Url</th>
			<th>Redirect Url</th>
			<th>Descriptions</th>
			<?php
			while ($row = mysqli_fetch_assoc($result) ) {?>
				<tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['app_id'];?></td>
					<td><?php echo $row['secret'];?></td>
					<td><?php echo $row['url'];?></td>
					<td><?php echo $row['re_url'];?></td>
					<td><?php echo $row['des'];?></td>
				</tr>
				
			<?php
		}
			?>

		</tr>
	</table>
</body>
</html>