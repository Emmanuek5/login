<?php

$dbhost = "bkuemrjp5rahdj1un8oq-mysql.services.clever-cloud.com:3306";
$dbuser = "uzz5u2xumsou06cr";
$dbpass = "JBvMADJqokDHcu0BK2zE";
$dbname = "bkuemrjp5rahdj1un8oq";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
