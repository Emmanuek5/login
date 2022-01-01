<?php 

$server = "bkuemrjp5rahdj1un8oq-mysql.services.clever-cloud.com:3306";
$dbuser = "uzz5u2xumsou06cr";
$dbpass = "JBvMADJqokDHcu0BK2zE";
$database = "bkuemrjp5rahdj1un8oq";

$conn = mysqli_connect($server, $dbuser, $dbpass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

$base_url = "https://login.blueobsidian.repl.co/upload/"; // Website url

?>