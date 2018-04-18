<?php

    require_once("DbCon.php");
    require_once("TripDaoMySql.php");
    require_once("TripViewFactory.php");

    if (isset($_GET['tripId']))
    {
        $tripDao = new TripDaoMySql($dbCon);
        $trip = $tripDao->getTrip($_GET['tripId']);

        $tripViewDetail = new TripViewDetail();
    }
    else
    {
		echo "Must provide a trip ID";
		exit;
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mileage Tracker - Viewing Trip</title>
	</head>
	<body>
        <?php $tripViewDetail->renderTrip($dbCon, $trip); ?>
        <div id="wrapper">
            <h3><a href="AllTrips.php">Return to All Trips</a></h3>
        </div>
    </body>
</html>