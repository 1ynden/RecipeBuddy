<?php

if(isset($_POST["searchID"]))
{

    $SID = $_POST["searchID"];

    $hostName = "localhost";
		$username_db = "recigprf_root";
		$password_db = "recipebuddyrootlogin";
		$dbName = "recigprf_recipebuddy";

		$output = array();

		//connect to the database
		$con = new mysqli($hostName, $username_db, $password_db, $dbName);

		if(!$con)
		{
			die("Connection failed: " .mysqli_connect_error());
		}

		//get the recipe info
    $query = "SELECT * FROM `recipe` WHERE `recipe_ID` = '$SID'";
	  $result = mysqli_query($con, $query);
		$row_search = mysqli_fetch_row($result);
    if(empty($row_search)){
			echo "No Recipes found, please try again";
		} else{
			array_push($output, $row_search[2]); //name
			array_push($output, $row_search[3]); //description
			array_push($output, $row_search[4]); //tags
			array_push($output, $row_search[5]); //time needed
			array_push($output, $row_search[7]); //servings
			array_push($output, $row_search[8]); //difficulty
			array_push($output, $row_search[9]); //picture
			array_push($output, $row_search[10]); //times cooked
      var_dump($output);
    }

	}
?>