<?php

if(isset($_POST["user"], $_POST["app"]))
    {
        $user_ID = $_POST["app"];
        $name = $_POST["ingr"];

		$hostName = "localhost";
		$username_db = "recigprf_root";
		$password_db = "recipebuddyrootlogin";
		$dbName = "recigprf_recipebuddy";


		//connect to the database
		$con = new mysqli($hostName, $username_db, $password_db, $dbName);

		if(!$con)
		{
			die("Connection failed: " .mysqli_connect_error());
		}

      $query = "INSERT INTO `user_appliances` (`user_ID`, `appliance_ID`, `appliance`) VALUES ('$user_ID', NULL, 'name')";
	    $result = mysqli_query($con, $query);
      echo("Success");
	}

?>
