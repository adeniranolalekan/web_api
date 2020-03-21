<?php
require("constants2.php");
//1. Create a Database connection
$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$connection){
	die("Database connection:".mysqli_error());
}
//2. Select a Database to use
$db_select=mysqli_select_db($connection,DB_NAME);
if(!$db_select){
	die("Database selection proper failed:".mysqli_error());
} 
?>