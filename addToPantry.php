<?php

    //$user_ID = $_POST["user_ID"];
	//$item = $_POST["item"];
	//$which_place = $_POST["place"];
	$user_ID = 19;
	$item = "Spoon";
	$which_place = "appliances";
	
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
		//get the id of appliance
		$query = "SELECT * FROM `appliances` WHERE `appliance_name` LIKE '$item'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		$appliance_to_add_ID = $row[0];
		
		//insert said appliance
		$query = "INSERT INTO `user_appliances` (`user_ID`, `appliance_ID`) VALUES ('$user_ID', '$appliance_to_add_ID')";
		$result = mysqli_query($con, $query);
		if($result)
        {
			echo "success appliance added";
		}
		else
		{
			echo "appliance was not added successfully.";
		}
		
	}
	
	if($which_place == "ingredients")
	{
		//get id of ingredient
		$query = "SELECT * FROM `ingredients` WHERE `ingredient_name` LIKE '$item'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		print_r($row[0]);
		$ingredient_to_add_ID = $row[0];
		
		//insert ingredient into table
		$query = "INSERT INTO `user_ingredients` (`user_ID`, `ingredient_ID`) VALUES ('$user_ID', '$ingredient_to_add_ID')";
		$result = mysqli_query($con, $query);
		if($result)
        {
			echo "success";
		}
		else
		{
			echo "ingredient was not added successfully.";
		}
		
	}
	
?>