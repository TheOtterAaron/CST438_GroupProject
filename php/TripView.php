<?php

    require_once("DbCon.php");
    require_once("Trip.php");
    require_once("TripController.php");

    if (isset($_GET['tripId']))
    {
        $trip = new Trip($dbCon, $_GET['tripId']);

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
        echo "<p>Starting Client ID: " . $trip->getStartingClientId() . "</p>";
        echo "<p>Ending Client ID: " . $trip->getEndingClientId() . "</p>";
        echo "<p>Date: " . $trip->getDate() . "</p>";
    }
    else
    {
        echo "<p>" . $error . "</p>";
    }
?>