<?php

if(isset($_POST["user"], $_POST["name"], $_POST["desc"], $_POST["ingrs"], $_POST["apps"], $_POST["instr"], $_POST["cat"], $_POST["time"], $_POST["serv"], $_POST["priv"]))
    {
        $user_ID = $_POST["user"];
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $ingrs = $_POST["ingrs"];
        $apps = $_POST["apps"];
        $instr = $_POST["instr"];
        $category = $_POST["cat"];
        $time = $_POST["time"];
        $servings = $_POST["serv"];
        $private = $_POST["priv"];
        $difficulty = "3"; //placeholder
        $picture = "placeholder"; //placeholder
        $times_cooked = "0";

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

        $query = "INSERT INTO `recipe` (`user_ID`, `recipe_ID`, `recipe_Name`, `recipe_Description`, `category`, `time`, `private_recipe`, `servings`, `difficulty`, `picture`, `times_cooked`) VALUES ('$user_ID', NULL, '$name', '$desc', '$category', '$time', '$private', '$servings', '$difficulty', '$picture', '$times_cooked')";
	    $result = mysqli_query($con, $query);
	}

?>
