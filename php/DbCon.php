<?php

    $host       = "localhost";
    $dbname     = "mileage_tracker";
    $username   = "gord1861";
    $password   = "pass123";

    $dbCon = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>