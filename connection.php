<?php
#connction details
$username="root";
$password="";
$dbname="mat_depot";
$hostname="localhost";

//creating conncetion
$con = new mysqli($hostname,$username,$password,$dbname);

//checking errors
if($con->connect_error){
	die("connection failed".$con->connect_error);
}

?>