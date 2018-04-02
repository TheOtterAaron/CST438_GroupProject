<?php
require 'db_connection.php';
session_start();

class Client
{
    public $clientId = 'clientId';
    public $name = 'clientName';
    public $addressId = 'addressId';

}

class Address
{
    public $addressId = 'addressId';
    public $addressLine1 = 'addressLine1';
    public $addressLine2 = 'addressLine2';
    public $city = 'city';
    public $state = 'state';
    public $zip = 'zip';
}

// function to grab all clients and sort ASC from DB

function fetchAllClients($yearSort) {
    global $dbConn;
    //it uses the variables declared previously
    if ($yearSort == 'ASC')
    {
        $sql = "SELECT clientId, clientName, addressId AS clientInformation FROM client ORDER BY clientId ASC";

    }

    else
    {
        $sql = "SELECT clientId, clientName, addresssId as clientInformation FROM client ORDER BY clientId DESC";
    }
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt -> fetchAll();
}



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="styles.css" rel="stylesheet">
		<title>Mileage Tracker</title>
	</head>