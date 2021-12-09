<?php

$search = $_GET[ "search" ];

$host = "localhost";
$user = "recigprf_root";
$password = "recipebuddyrootlogin";
$dbName = "recigprf_recipebuddy";

$con = new mysqli( $host, $user, $password, $dbName );

$sql = "SELECT * FROM `recipe` WHERE MATCH( `recipe_Name`, `category` ) AGAINST( "' . $search . '" )";
$result = $con->query( $sql );

$output = array();

if( $result->num_rows > 0 ) {
    while( $row = $result->fetch_assoc() ){
        $output[] = array( "recipe_Name" => $row[ "recipe_Name" ], "recipe_Description" => $row[ "recipe_Description" ], "recipe_ID" => $row[ "recipe_ID" ], "time" => $row[ "time" ] );
    }
}
$con->close();

echo( json_encode( $output ) );

?>
