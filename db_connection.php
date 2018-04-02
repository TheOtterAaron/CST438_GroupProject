<?php

$host     = "localhost";
$dbname   = ""; //change this to your otterID
$username = ""; //change this to your otter ID
$password = ""; //change this to your database account password

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