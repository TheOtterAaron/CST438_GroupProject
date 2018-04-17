<?php
require "DbCon.php";
require_once("Trip.php");
require_once("Client.php");
require_once("TripViewFactory.php");

session_start();

function fetchAllTrips()
{
    global $dbCon;

    $sql = "SELECT tripId FROM trip;";

    $stmt = $dbCon -> prepare($sql);
    $stmt -> execute();
    return $stmt -> fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Trips</title>
</head>

<body>
<div id="wrapper">
    <table>
        <tr>
            <th>Trip</th>
        </tr>
        <?php
        $trips = fetchAllTrips();
        foreach ($trips as $line)
        {
            $tripId = $line['tripId'];
            $trip = new Trip($dbCon, $tripId);

            $tripViewLineItem = new TripViewLineItem();
            $tripViewLineItem->renderTrip($dbCon, $trip);

        }

        ?>
    </table>
</div>
</body>
</html>