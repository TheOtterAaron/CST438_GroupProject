<?php

    require_once("../DbCon.php");
    require_once("../TripController.php");

    $tripController = new TripController($dbCon);

    $trip = $tripController->createTrip(4, 7, "2018-03-28 01:57:05");
    echo "Creating new trip.<br/>";
    echo "Starting Client ID: 4<br/>";
    echo "Ending Client ID: 7<br/>";
    echo "Date: 2018-03-28 01:57:05<br/><br/>";

    $result_getStartingClientId = $trip->getStartingClientId() == 4 ? "pass" : "fail";
    echo ("Test getStartingClientId(): " . $result_getStartingClientId . "<br/>");

    $result_getEndingClientId = $trip->getEndingClientId() == 7 ? "pass" : "fail";
    echo ("Test getEndingClientId(): " . $result_getEndingClientId . "<br/>");

    $result_getDate = $trip->getDate() == "2018-03-28 01:57:05" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDate . "<br/>");
    

    $tripId = $trip->getTripId();
    $tripController->deleteTrip($tripId);
    echo ("<br/>Deleting trip ID: " . $tripId . "<br/>");
    
    $trip = new Trip($dbCon, $tripId);
    $result_getTripId = $trip->getTripId() == -1 ? "pass" : "fail";
    echo ("Checking database: " . $result_getTripId . "<br/>");


    $trip = $tripController->createTrip(3, 2, "2018-03-29 03:40:00");
    echo "<br/>Creating new trip.<br/>";
    echo "Starting Client ID: 3<br/>";
    echo "Ending Client ID: 2<br/>";
    echo "Date: 2018-03-29 03:40:00<br/><br/>";

    $result_getStartingClientId = $trip->getStartingClientId() == 3 ? "pass" : "fail";
    echo ("Test getStartingClientId(): " . $result_getStartingClientId . "<br/>");

    $result_getEndingClientId = $trip->getEndingClientId() == 2 ? "pass" : "fail";
    echo ("Test getEndingClientId(): " . $result_getEndingClientId . "<br/>");

    $result_getDate = $trip->getDate() == "2018-03-29 03:40:00" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDate . "<br/>");


    $tripId = $trip->getTripId();
    $tripController->deleteTrip($tripId);
    echo ("<br/>Deleting trip ID: " . $tripId . "<br/>");
    
    $trip = new Trip($dbCon, $tripId);
    $result_getTripId = $trip->getTripId() == -1 ? "pass" : "fail";
    echo ("Checking database: " . $result_getTripId . "<br/>");


    $trip = $tripController->updateTrip(1, 2, 6, "2017-02-19 05:45:30");
    echo "<br/>Updating trip ID: 1<br/>";

    $result_getStartingClientId = $trip->getStartingClientId() == 2 ? "pass" : "fail";
    echo ("Test getStartingClientId(): " . $result_getStartingClientId . "<br/>");

    $result_getEndingClientId = $trip->getEndingClientId() == 6 ? "pass" : "fail";
    echo ("Test getEndingClientId(): " . $result_getEndingClientId . "<br/>");

    $result_getDate = $trip->getDate() == "2017-02-19 05:45:30" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDate . "<br/>");


    $trip = $tripController->updateTrip(1, 0, 1, "2018-04-02 00:00:00");
    echo "<br/>Resetting trip ID: 1<br/>";

    $result_getStartingClientId = $trip->getStartingClientId() == 0 ? "pass" : "fail";
    echo ("Test getStartingClientId(): " . $result_getStartingClientId . "<br/>");

    $result_getEndingClientId = $trip->getEndingClientId() == 1 ? "pass" : "fail";
    echo ("Test getEndingClientId(): " . $result_getEndingClientId . "<br/>");

    $result_getDate = $trip->getDate() == "2018-04-02 00:00:00" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDate . "<br/>");
?>
