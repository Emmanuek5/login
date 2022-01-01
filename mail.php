
<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?><!DOCTYPE html>
<html>
<head>
	<title>Send Me A Mail</title>
	<style type="text/css">
		body{

			background: #4db6ac;
			align-items: center;
		}
		.btn {
    background: #4db6ac;
    border: none;
    outline: none;
    margin: 20px 0;
    padding: .7rem 2rem;
    font-size: 1.3rem;
    color: #FFF;
    border-radius: 3px;
    opacity: .8;
    cursor: pointer;
    transition: .3s;
}

.btn:hover {
    opacity: 1;
    background:33deg,#45aaf2,#2d98da,#eb3b5a,#4b7bec,#3867d6,#eb3b5a;
}
.body {
    width: 100%;
    min-height: 100vh;
    background: #4F6072;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border: 5px;
    border-color: red;
}

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
	.bo{
	background-color:blue ;
		size: 7000px;
		padding:60px;
	}
	.bo:hover{
		background-color: white;
		opacity: 10;
	}

		



		}

	</style>
</head>
<body>
	<form action="https://formsubmit.co/infoujc19@gmail.com" method="POST" class="body">
     <div>
     	<label>Name</label>
     	<input type="text" name="name" placeholder="Name" id="text" required>
     </div>
    <div> <label>Email</label>
    	<input type="email" name="email" placeholder="Email" id="text" required>
    </div><br>
    
    <div>
    	<label>Message</label>
    	<input type="text" name="Message" class="bo" placeholder="Write Your Message">
    </div>
    	
    <input type="hidden" name="_next" value="https://192.168.1.111/login/thanks.php">
    <input type="hidden" name="_captcha" value="false">
    <input type="hidden" name="_subject" value="New Message">

     <button type="submit" class="btn">Send</button>
</form>
</body>
</html>