<?php

if(isset($_POST["username"], $_POST["password"])) 
    {     

        $username = $_POST["username"]; 
        $password = $_POST["password"];
		if(strlen($password) > 15)
		{
			throw new Exception("Password needs to be less than 15 characters");
		}

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
		
        $query = "Insert Into `users` (`user_ID`, `username`, `password`) VALUES (NULL, '$username', '$password')";
	    $result = mysqli_query($con, $query);
        if($result)
        {
			echo $result[0];
		}
		else
		{
			echo -1;
		}

      
	   
	}

?>