<?php

    //$user_ID = $_POST["user_ID"];
	//$item = $_POST["item"];
	//$which_place = $_POST["place"];
	
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
	
	if($which_place == "appliances")
	{
		$query = "Select appliance_ID From `ingredients` WHERE $item LIKE ingredient_name";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		$appliance_to_add_ID = $row[0];
		
		$query = "INSERT INTO `user_appliances` (`user_ID, `appliance_ID`) VALUES ('$user_ID', '$appliance_to_add_ID')";
		$result = mysqli_query($con, $query);
		if($result)
        {
			header("Location: pantry.html");
		}
		else
		{
			echo "appliance was not added successfully.";
		}
		
	}
	
	if($which_place = "ingredients")
	{
		$query = "Select ingredient_ID From `ingredients` WHERE $item LIKE ingredient_name";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		$ingredient_to_add_ID = $row[0];
		
		$query = "INSERT INTO `user_ingredients` (`user_ID`, `ingredient_ID`) VALUES ('$user_ID', '$ingredient_to_add_ID)'";
		$result = mysqli_query($con, $query);
		if($result)
        {
			header("Location: pantry.html");
		}
		else
		{
			echo "ingredient was not added successfully.";
		}
		
	}
	
?>