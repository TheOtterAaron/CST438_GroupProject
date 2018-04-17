<?php

    require_once("DbCon.php");
    require_once("Client.php");
    require_once("Address.php");
    require_once("Trip.php");
    require_once("TripController.php");
    require_once("TripViewFactory.php");

    if (isset($_GET['tripId']))
    {
        $trip = new Trip($dbCon, $_GET['tripId']);

        $tripViewDetail = new TripViewDetail();
        $tripViewDetail->renderTrip($dbCon, $trip);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trip Detail View</title>
</head>

<body>
<div id="wrapper">
<h3><a href="AllTrips.php">Return to All Trips</a></h3>
</div>
</body>
</html>