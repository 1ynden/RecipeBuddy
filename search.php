<?php

if(isset($_POST["search"])) 
    {     

        $search = $_POST["search"]; 

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
		
		//get the recipe info
        $query = "SELECT * FROM `recipe` WHERE `recipe_name` LIKE '$search'";
	    $result = mysqli_query($con, $query);
		$row_search = mysqli_fetch_row($result);
        if(empty($row_search)){
			echo "No Recipes found, please try again";
		} else{
			//header("Location: recipe.html");
		}
		
		//get recipe rating
		$user_rating = array();
		$query = "SELECT user_rating From recipe_ratings WHERE recipe_ID = $row_search[1]";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result, MYSQLI_NUM))
		{
			array_push($user_rating, $row[0]);
		}
		$average = array_sum($user_rating) / count($user_rating);
		echo $average;
		
		
		//get recipe name
		$query = "SELECT recipe.recipe_name From recipe_steps Inner JOIN recipe ON recipe_steps.recipe_ID = recipe.recipe_ID";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		 if(empty($row)){
			echo "No recipe name found, please try again";
		} else{
			$recipe_name = $row[0];
			//print_r($row[0]);
			//header("Location: recipe.html");
		}
		
		//get recipe description
		$query = "SELECT recipe.recipe_description From recipe_steps Inner JOIN recipe ON recipe_steps.recipe_ID = recipe.recipe_ID";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		 if(empty($row)){
			echo "No description found, please try again";
		} else{
			$recipe_description = $row[0];
			//print_r($row[0]);
			//header("Location: recipe.html");
		}
		
		//get recipe time
		$query = "SELECT recipe.time From recipe_steps Inner JOIN recipe ON recipe_steps.recipe_ID = recipe.recipe_ID";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		 if(empty($row)){
			echo "No time found, please try again";
		} else{
			$recipe_time = $row[0];
			//print_r($row[0]);
			//header("Location: recipe.html");
		}
		//get times cooked
		$query = "SELECT recipe.times_cooked From recipe_steps Inner JOIN recipe ON recipe_steps.recipe_ID = recipe.recipe_ID";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		 if(empty($row)){
			echo "No times cooked found, please try again";
		} else{
			$recipe_time = $row[0];
			//print_r($row[0]);
			//header("Location: recipe.html");
		}
		
		//get difficulty
		$query = "SELECT recipe.difficulty From recipe_steps Inner JOIN recipe ON recipe_steps.recipe_ID = recipe.recipe_ID";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		 if(empty($row)){
			echo "No difficulty found, please try again";
		} else{
			$recipe_time = $row[0];
			//print_r($row[0]);
			//header("Location: recipe.html");
		}
		
		//get picture
		$query = "SELECT recipe.picture From recipe_steps Inner JOIN recipe ON recipe_steps.recipe_ID = recipe.recipe_ID";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_row($result);
		 if(empty($row)){
			echo "No picture found, please try again";
		} else{
			$recipe_time = $row[0];
			//print_r($row[0]);
			//header("Location: recipe.html");
		}  
	}
?>