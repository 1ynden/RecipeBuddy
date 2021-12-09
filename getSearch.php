<?php

$search = $_GET[ "search" ];

$host = "localhost";
$user = "recigprf_root";
$password = "recipebuddyrootlogin";
$dbName = "recigprf_recipebuddy";

$con = new mysqli( $host, $user, $password, $dbName );

$sql = "SELECT * FROM `recipe` WHERE `recipe_Name` LIKE '$search' OR `category` LIKE '$search' ";
$result = $con->query( $sql );

$output = array();

if( $result->num_rows > 0 ) {
    while( $row = $result->fetch_assoc() ){
        $dummyRating = $row["recipe_ID"];
        $ratingsql = "SELECT AVG(`user_rating`) FROM `recipe_ratings` WHERE `recipe_ID` = 1";
        $ratings = $con->query( $sql );
        $output[] = array( "recipe_Name" => $row[ "recipe_Name" ], "recipe_Description" => $row[ "recipe_Description" ], "recipe_ID" => $row[ "recipe_ID" ], "time" => $row[ "time" ], "score" => $ratings );
    }
}
$con->close();

echo( json_encode( $output ) );

?>
