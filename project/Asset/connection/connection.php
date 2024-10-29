<?php
$server="localhost";
$user="root";
$password="";
$db="db_care";
$con=mysqli_connect($server,$user,$password,$db);
if(!$con)
{
	echo "Connection failed";
}
?>