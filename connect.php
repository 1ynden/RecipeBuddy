<?php

//variables to access database
$hostName = "localhost";
$username_db = "root";
$password_db = "";
$dbName = "recigprf_recipebuddy";

//connect to the database
$connect = new mysqli($hostName, $username_db, $password_db, $dbName);

if(!$connect)
{
	die("Connection failed: " .mysqli_connect_error());
}


?>