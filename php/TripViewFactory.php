<?php
require_once("Trip.php");
require_once("Client.php");
require_once("Address.php");

interface iTripView
{
    public function renderTrip($dbCon, $trip);
}

class TripViewLineItem implements iTripView
{

    public function renderTrip($dbCon, $trip)
    {
        $tripId = $trip->getTripId();
        echo "<tr>";
        echo "<td><a href=\"TripView.php?tripId=" . $tripId ."\">" . $tripId . "</a></td>";
        echo "<td>" . $trip->getStartingClientId() . "</a></td>";
        echo "<td>" . $trip->getEndingClientId() . "</a></td>";
        echo "</tr>";
    }
}

class TripViewDetail implements iTripView
{
    public function renderTrip($dbCon, $trip)
    {
        $startingClient = new Client($trip->getStartingClientId());
        $endingClient = new Client($trip->getEndingClientId());

        $startingAddress = new Address($startingClient->getAddressId());
        $endingAddress = new Address($endingClient->getAddressId());

        echo "<p>Starting Client: " . $startingClient->getClientName() . " (" . $startingAddress->getZip() . ")</p>";
        echo "<p>Ending Client: " . $endingClient->getClientName() . " (" . $endingAddress->getZip() . ")</p>";
        echo "<p>Date: " . $trip->getDate() . "</p>";
    }

}