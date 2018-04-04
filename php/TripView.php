<?php

    require_once("DbCon.php");
    require_once("Client.php");
    require_once("Address.php");
    require_once("Trip.php");
    require_once("TripController.php");

    if (isset($_GET['tripId']))
    {
        $trip = new Trip($dbCon, $_GET['tripId']);
        
        $startingClient = new Client($trip->getStartingClientId());
        $endingClient = new Client($trip->getEndingClientId());

        $startingAddress = new Address($startingClient->getAddressId());
        $endingAddress = new Address($endingClient->getAddressId());

        if ($trip->getTripId() == -1)
        {
            $error = "Trip not found";
        }
    }
    else
    {
        $error = "Must provide a trip ID";
    }

?>

<h1>Trip View</h1>

<?php
    if (empty($error))
    {
        echo "<p>Starting Client: " . $startingClient->getClientName() . " (" . $startingAddress->getZip() . ")</p>";
        echo "<p>Ending Client: " . $endingClient->getClientName() . " (" . $endingAddress->getZip() . ")</p>";
        echo "<p>Date: " . $trip->getDate() . "</p>";
    }
    else
    {
        echo "<p>" . $error . "</p>";
    }
?>