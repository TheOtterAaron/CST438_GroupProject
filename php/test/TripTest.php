<?php

    require_once("Assertions.php");
    require_once("../Trip.php");

    // Test creating a new tirp
    $trip = new Trip(
        1,
        1,
        2,
        "2018-04-02 00:00:00");
    echo "Creating new trip<br/>";
    
    assertEqual($trip->getTripId(), 1, "getTripId()");
    assertEqual($trip->getStartingClientId(), 1, "getStartingClientId()");
    assertEqual($trip->getEndingClientId(), 2, "getEndingClientId()");
    assertEqual($trip->getDate(), "2018-04-02 00:00:00", "getDate()");

    // Test mutating trip
    $trip->setStartingClientId(3);
    $trip->setEndingClientId(5);
    $trip->setDate("2018-04-15 00:00:00");
    echo "<br/>Mutating trip<br/>";

    assertEqual($trip->getTripId(), 1, "getTripId()");
    assertEqual($trip->getStartingClientId(), 3, "getStartingClientId()");
    assertEqual($trip->getEndingClientId(), 5, "getEndingClientId()");
    assertEqual($trip->getDate(), "2018-04-15 00:00:00", "getDate()");
    
?>
