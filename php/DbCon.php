<?php

    require_once("DbCreds.php");

    try
    {
        $dbCon = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }
    catch(Exception $e)
    {
        echo"Unable to connect to database!";
        exit();
    }

    $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>