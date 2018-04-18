<?php

require_once("ClientDaoMySql.php");
require_once("AddressDaoMySql.php");
require_once("MileageCalculator.php");

interface iTripView
{
    public function renderTrip($dbCon, $trip);
}

class TripViewLineItem implements iTripView
{
    public function renderTrip($dbCon, $trip)
    {
        $clientDao = new ClientDaoMySql($dbCon);

        $tripId = $trip->getTripId();
        $startingClient = $clientDao->getClient($trip->getStartingClientId());
        $endingClient = $clientDao->getClient($trip->getEndingClientId());

        echo "<tr>";
        echo "<td><a href=\"TripView.php?tripId=" . $tripId ."\">" . $tripId . "</a></td>";
        echo "<td>From: " . $startingClient->getName() . "</a></td>";
        echo "<td>To: " . $endingClient->getName() . "</a></td>";
        echo "</tr>";
    }
}

class TripViewDetail implements iTripView
{
    public function renderTrip($dbCon, $trip)
    {
        $clientDao = new ClientDaoMySql($dbCon);
        $addressDao = new AddressDaoMySql($dbCon);

        if ($trip->getTripId() == -1)
        {
            $error = "Trip not found";
        }
        else
        {
            $startingClient = $clientDao->getClient($trip->getStartingClientId());
            $endingClient = $clientDao->getClient($trip->getEndingClientId());
    
            if ($startingClient->getClientId() == -1 ||
                $endingClient->getClientId() == -1)
            {
                $error = "Starting or ending client not found";   
            }
            else
            {
                $startingAddress = $addressDao->getAddress($startingClient->getAddressId());
                $endingAddress = $addressDao->getAddress($endingClient->getClientId());

                if ($startingAddress->getAddressId() == -1 ||
                    $endingAddress->getAddressId() == -1)
                {
                    $error = "Starting or ending address not found"   ;
                }
            }
        }

        if (empty($error))
        {
            echo "<h1>Trip View</h1>";
            echo "<p>Starting Client: " .
                "<a href='ClientView.php?clientId=" . $startingClient->getClientId() . "'>" .
                    $startingClient->getName() .
                "</a>" .
                " (" . $startingAddress->getZip() . ")</p>";
            echo "<p>Ending Client: " .
                "<a href='ClientView.php?clientId=" . $endingClient->getClientId() . "'>" .
                    $endingClient->getName() .
                "</a>" .
                " (" . $endingAddress->getZip() . ")</p>";
            echo "<p>Date: " . $trip->getDate() . "</p>";
			$mileage = round(calculateMileage($startingAddress, $endingAddress));
			echo "Mileage: " . $mileage;
        }
        else
        {
            echo "<p>" . $error . "</p>";
        }
    }
}

