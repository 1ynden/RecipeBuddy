<?php

	//$user_ID = $_POST["user_ID"];

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
	//get the users appliances
	$appliances = array();
    $query = "SELECT * FROM `user_appliances` WHERE `user_ID` = '10'";
	$result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		array_push($appliances, $row[1]);
	}
    //print_r($appliances);	
	
	$appliance_names = array();
	foreach($appliances as $value){
		$query = "SELECT appliances.appliance_name From `user_appliances` Inner JOIN `appliances` WHERE appliances.appliance_ID = $value";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		array_push($appliance_names, $row[0]);
	}
	$unique_appliance_names = array();
	$unique_appliance_names = array_unique($appliance_names);
	print_r($unique_appliance_names);
	
	//get the users ingredients
	$ingredients = array();
    $query = "SELECT * FROM `user_ingredients` WHERE `user_ID` = '10'";
	$result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_NUM))
	{
		array_push($ingredients, $row[1]);
	}
	
	$ingredient_names = array();
	foreach($ingredients as $value){
		$query = "SELECT ingredients.ingredient_name From `user_ingredients` Inner JOIN `ingredients` WHERE ingredients.ingredient_ID = $value";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		array_push($ingredient_names, $row[0]);
	}
	$unique_ingreident_names = array();
	$unique_ingredient_names = array_unique($ingredient_names);
	print_r($unique_ingredient_names);
	
?>