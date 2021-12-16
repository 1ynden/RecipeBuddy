<?php

if(isset($_POST["user"], $_POST["ingr"]))
    {
        $user_ID = $_POST["user"];
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

      $query = "INSERT INTO `user_ingredients` (`user_ID`, `ingredient_ID`, `ingredient`) VALUES ('$user_ID', NULL, 'name')";
	    $result = mysqli_query($con, $query);
      echo("Success");
	}

?>
