<?php

if(isset($_POST["username"], $_POST["password"]))
    {

        $username = $_POST["username"];
        $password = $_POST["password"];

		$hostName = "localhost";
		$username_db = "recigprf_root";
		$password_db = "recipebuddyrootlogin";
		$dbName = "recigprf_recipebuddy";

		$con = new mysqli($hostName, $username_db, $password_db, $dbName);

		if(!$con)
		{
			die("Connection failed: " .mysqli_connect_error());
		}
		

        $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		
		if(empty($row)){
			echo -1;
		} else{
			echo $row[0];
		}

	}
?>
