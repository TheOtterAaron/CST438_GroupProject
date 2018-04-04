<?php

$host     = "localhost";
$dbname   = "mileage_tracker";
$username = "root"; //change this to your otter ID
$password = "mrRabbitRocks96"; //change this to your database account password

// establish database connection
try
{
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
catch(Exception $e)
{
    echo"Unable to connect to database!";
    exit();
}

$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>