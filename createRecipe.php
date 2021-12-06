<?php

if(isset($_POST["name"], $_POST["desc"], $_POST["ingrs"], $_POST["apps"], $_POST["instr"])) 
    {     

        $name = $_POST["name"]; 
        $desc = $_POST["desc"];
        $ingrs = $_POST["ingrs"];
        $apps = $_POST["apps"];
        $instr = $_POST["instr"];
        $category = "test";
        $time = '30'; //placeholder
        $private = "1"; //placeholder
        $servings = "4"; //placeholder
        $difficulty = "2"; //placeholder
        $user_ID = "10"; //placeholder
        $picture = "placeholder"; //placeholder
        $times_cooked = "0"; //placeholder

		$hostName = "localhost";
		$username_db = "root";
		$password_db = "";
		$dbName = "recipebuddy";
       

		//connect to the database
		$con = new mysqli($hostName, $username_db, $password_db, $dbName);

		if(!$con)
		{
			die("Connection failed: " .mysqli_connect_error());
		}
		
        $query = "INSERT INTO `recipe` (`user_ID`, `recipe_ID`, `recipe_Name`, `recipe_Description`, `category`, `time`, `private_recipe`, `servings`, `difficulty`, `picture`, `times_cooked`) VALUES ('$user_ID', NULL, '$name', '$desc', '$category', '$time', '$private', '$servings', '$difficulty', '$picture', '$times_cooked')";
	    $result = mysqli_query($con, $query);
        header("location: home.html");
	}

?>