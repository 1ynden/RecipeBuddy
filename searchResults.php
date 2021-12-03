<?php

if(isset($_POST["search"])) 
    {     

        $search = $_POST["search"]; 

		$hostName = "localhost";
		$username_db = "root";
		$password_db = "";
		$dbName = "recipebuddy";
        
		$search_results = array();
		
		//connect to the database
		$con = new mysqli($hostName, $username_db, $password_db, $dbName);

		if(!$con)
		{
			die("Connection failed: " .mysqli_connect_error());
		}
		
		//get the recipe info
        $query = "SELECT * FROM `recipe` WHERE `recipe_name` LIKE '$search' AND `private_recipe` = '1'";
	    $result = mysqli_query($con, $query);
		$row_search = mysqli_fetch_row($result);
        if(empty($row_search)){
			echo "No Recipes found, please try again";
		} else{
			array_push($search_results, $row_search[2]); //name
			array_push($search_results, $row_search[3]); //description
			array_push($search_results, $row_search[5]); //time needed
			$user_rating = array();
			$query = "SELECT user_rating From recipe_ratings WHERE recipe_ID = $row_search[1]";
			$result = mysqli_query($con, $query);
			while($row = mysqli_fetch_array($result, MYSQLI_NUM))
			{
				array_push($user_rating, $row[0]);
			}
			$average = array_sum($user_rating) / count($user_rating);
			array_push($search_results, $average); //recipe rating
		}
		print_r($search_results);
	}
?>