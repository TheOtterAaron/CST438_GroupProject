<?php

    require_once("DbCon.php");
	require_once("TripDaoMySql.php");
	require_once("ClientDaoMySql.php");
	require_once("AddressDaoMySql.php");

    $tripDao = new TripDaoMySql($dbCon);
    $clientDao = new ClientDaoMySql($dbCon);
    $addressDao = new AddressDaoMySql($dbCon);

    if (isset($_GET['tripId']))
    {
        $trip = $tripDao->getTrip($_GET['tripId']);
        
        if ($trip->getTripId() == -1)
        {
            $error = "Trip not found";
        }
        else
        {
            $clients = $clientDao->getClients(array(
                $trip->getStartingClientId(),
                $trip->getEndingClientId()
            ));
    
            if ($clients[0]->getClientId() == -1 ||
                $clients[1]->getClientId() == -1)
            {
                $error = "Starting or ending client not found";   
            }
            else
            {
                $addresses = $addressDao->getAddresses(array(
                    $clients[0]->getAddressId(),
                    $clients[1]->getAddressId()
                ));

                if ($addresses[0]->getAddressId() == -1 ||
                    $addresses[1]->getAddressId() == -1)
                {
                    $error = "Starting or ending address not found"   ;
                }
            }
        }
    }
    else
    {
        $error = "Must provide a trip ID";
    }

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Mileage Tracker - Viewing Trip</title>
	</head>
	<body>
    <?php
        if (empty($error))
        {
            echo "<h1>Trip View</h1>";
            echo "<p>Starting Client: " .
                "<a href='ClientView.php?clientId=" . $clients[0]->getClientId() . "'>" .
                    $clients[0]->getName() .
                "</a>" .
                " (" . $addresses[0]->getZip() . ")</p>";
            echo "<p>Ending Client: " .
                "<a href='ClientView.php?clientId=" . $clients[1]->getClientId() . "'>" .
                    $clients[1]->getName() .
                "</a>" .
                " (" . $addresses[1]->getZip() . ")</p>";
            echo "<p>Date: " . $trip->getDate() . "</p>";
        }
        else
        {
            echo "<p>" . $error . "</p>";
        }
    ?>
    </body>
</html>