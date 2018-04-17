<?php

    require_once("Assertions.php");
    require_once("../DbCon.php");
    require_once("../TripDaoMySql.php");

    $tripDao = new TripDaoMySql($dbCon);

    // Test fetching trip 1
    echo "Fetching trip 1<br/>";

    $trip = $tripDao->getTrip(1);
    assertEqual($trip->getTripId(), 1, "getTripId()");
    assertEqual($trip->getStartingClientId(), 0, "getStartingClientId()");
    assertEqual($trip->getEndingClientId(), 1, "getEndingClientId()");
    assertEqual($trip->getDate(), "2018-04-02 00:00:00", "getDate()");

    // Test fetching trip 2
    echo "<br/>Fetching trip 2<br/>";

    $trip = $tripDao->getTrip(2);
    assertEqual($trip->getTripId(), 2, "getTripId()");
    assertEqual($trip->getStartingClientId(), 1, "getStartingClientId()");
    assertEqual($trip->getEndingClientId(), 0, "getEndingClientId()");
    assertEqual($trip->getDate(), "2018-04-02 00:00:00", "getDate()");

    // Test fetching trip 500 (DNE)
    echo "<br/>Fetching trip 500 (DNE)<br/>";

    $trip = $tripDao->getTrip(500);
    assertEqual($trip->getTripId(), -1, "getTripId()");

    // Test adding trip
    echo "<br/>Adding trip<br/>";

    $newTrip = new Trip(
        NULL,
        3,
        6,
        "2018-04-15 00:00:00");
    $savedTrip = $tripDao->addTrip($newTrip);
    assertEqual($savedTrip->getTripId(), $dbCon->lastInsertId(), "getTripId()" . $savedTrip->getTripId());

    // Test fetching added trip
    echo "<br/>Fetching added trip<br/>";

    $trip = $tripDao->getTrip($savedTrip->getTripId());
    assertEqual($trip->getTripId(), $savedTrip->getTripId(), "getTripId()");
    assertEqual($trip->getStartingClientId(), 3, "getStartingClientId()");
    assertEqual($trip->getEndingClientId(), 6, "getEndingClientId()");
    assertEqual($trip->getDate(), "2018-04-15 00:00:00", "getDate()");

    // Test fetching multiple trips
    echo "<br/>Fetching multiple trips<br/>";

    $trips = $tripDao->getTrips(array(1, 2, $savedTrip->getTripId()));
    assertEqual($trips[0]->getStartingClientId(), 0, "startingClientId()");
    assertEqual($trips[1]->getEndingClientId(), 0, "endingClientId()");
    assertEqual($trips[2]->getDate(), "2018-04-15 00:00:00", "getDate()");

    // Test updating trip
    echo "<br/>Updating trip<br/>";

    $trip->setStartingClientId(8);
    $trip->setEndingClientId(9);
    $trip->setDate("2018-04-16 00:00:00");
    assertEqual($tripDao->updateTrip($trip), true, "updateTrip()");

    // Test fetching updated trip
    echo "<br/>Fetching updated trip<br/>";

    $trip = $tripDao->getTrip($savedTrip->getTripId());
    assertEqual($trip->getTripId(), $savedTrip->getTripId(), "getTripId()");
    assertEqual($trip->getStartingClientId(), 8, "getStartingClientId()");
    assertEqual($trip->getEndingClientId(), 9, "getEndingClientId()");
    assertEqual($trip->getDate(), "2018-04-16 00:00:00", "getDate()");

    // Test deleting trip
    echo "<br/>Deleting trip<br/>";

    assertEqual($tripDao->deleteTrip($savedTrip->getTripId()), true, "deleteTrip()");
    $trip = $tripDao->getTrip($savedTrip->getTripId());
    assertEqual($trip->getTripId(), -1, "getTripId()");
    assertEqual($tripDao->deleteTrip($savedTrip->getTripId()), false, "deleteTrip()");

?>