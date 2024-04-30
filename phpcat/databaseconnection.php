<?php  
$servername="localhost";
$username="lulu";
$password="222008154";
$dbname="students attendance database";
$connection=new mysqli($servername,$username,$password,$dbname);
if ($connection->connect_error) {
	die("connection failed.".$connection->connect_error);
}
$connection->select_db($dbname);
?>