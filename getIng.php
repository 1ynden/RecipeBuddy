<?php

if(isset($_POST["user"]))
  {
    $user_ID = $_POST["user"];

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

    $query = "SELECT * FROM `user_ingredients` WHERE `user_ID` = '$user_ID'";
    $result = $con->query( $query );

    $output = array();

    if( $result->num_rows > 0 ) {
        while( $row = $result->fetch_assoc() ){
            $output[] = array( "ingr_Name" => $row[ "ingredient" ]);
        }
        echo( json_encode( $output ) );
    }
    else{
      echo("NULL");
    }
    $con->close();
	}

?>
