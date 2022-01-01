<?php

session_start();
include 'connection.php';
include 'functions.php';

$code = $_GET['code'];
$id = $_GET['user_id'];
$sql ="SELECT * FROM `users` WHERE `user_id` = '$id'";
$query = mysqli_query($con,$sql);
$user_data = mysqli_fetch_assoc($query);
$codes = "SELECT * FROM `code` WHERE `code` ='$code'";
$query1 = mysqli_query($con,$codes);
$code1 = mysqli_fetch_assoc($query1);
    if (isset($_GET['app_id']) & isset($_GET['app_secret'])  & $_GET['code'] == $code1['code']) {
    $and = array(
        'user_name' => $user_data['user_name'],
        'password' => $user_data['password'],
        'email' => $user_data['email'],
        




    );
   
 echo  json_encode($and, JSON_PRETTY_PRINT);
    


        # code...
    }else {
       $error = array('code' => "6",
                        'message' =>"Error"
     );
     echo json_encode($error , JSON_PRETTY_PRINT);
    }

    

