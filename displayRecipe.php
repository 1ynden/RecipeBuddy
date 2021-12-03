<?php

if(isset($_POST["search"])) 
    {     

        $recipe = $_POST["search"]; 

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
        $query = "SELECT * FROM `recipe` WHERE `recipe_name` LIKE '$recipe'";
	    $result = mysqli_query($con, $query);
		$row_search = mysqli_fetch_row($result);
        if(empty($row_search)){
			echo "No Recipes found, please try again";
		} else{
			array_push($search_results, $row_search[2]); //name
			array_push($search_results, $row_search[3]); //description
			array_push($search_results, $row_search[4]); //tags
			array_push($search_results, $row_search[5]); //time needed
			array_push($search_results, $row_search[7]); //servings
			array_push($search_results, $row_search[8]); //difficulty
			array_push($search_results, $row_search[9]); //picture
			array_push($search_results, $row_search[10]); //times cooked
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
		
		//get the step instructions
		$query = "SELECT * From recipe_steps Inner JOIN recipe ON recipe_steps.recipe_ID = recipe.recipe_ID AND recipe_steps.step_number = '1'";
		//$query = "Select * From `recipe_steps` INNER JOIN `recipe` ON recipe_steps.recipe_ID = '$row_search[0]'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		if(empty($row))
		{
			echo "Your recipe is done";
		} 
		else
		{
			array_push($search_results, $row[1]);
			array_push($search_results, $row[2]);
		}
		//print_r($search_results);
		
		//get the step appliances
		$query = "Select ingredients.ingredient_name From `recipe_steps` Inner Join `ingredients` On 'recipe_step.ingredient_ID' = 'ingredients.ingredient_ID'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		if(empty($row))
		{
			echo "Your recipe is done";
		} 
		else
		{
			print_r($row[0]);
		}
		
		
	}
?>