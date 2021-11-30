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
		

        $query = "SELECT * FROM `recipe` WHERE `recipe_Name` LIKE '$search'";
	    $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        if(empty($row)){
            header("Location: index.html");
        }else{
            print_r($row[0]);
            header("Location: index.html");
        }
	   
	}

?>