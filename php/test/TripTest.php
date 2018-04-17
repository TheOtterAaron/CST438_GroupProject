<?php

    require_once("../DbCon.php");
    require_once("../Trip.php");

    $trip = new Trip($dbCon, 1);
    echo "Trip ID: 1<br/>";

    $result_getTripId = $trip->getTripId() == 1 ? "pass" : "fail";
    echo ("Test getTripId(): " . $result_getTripId . "<br/>");

    $result_getStartingClientId = $trip->getStartingClientId() == 0 ? "pass" : "fail";
    echo ("Test getStartingClientId(): " . $result_getStartingClientId . "<br/>");

    $result_getEndingClientId = $trip->getEndingClientId() == 1 ? "pass" : "fail";
    echo ("Test getEndingClientId(): " . $result_getEndingClientId . "<br/>");

    $result_getDate = $trip->getDate() == "2018-04-02 00:00:00" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDate . "<br/>");


    $trip = new Trip($dbCon, 4);
    echo "<br/>Trip ID: 4<br/>";

    $result_getTripId = $trip->getTripId() == 4 ? "pass" : "fail";
    echo ("Test getTripId(): " . $result_getTripId . "<br/>");

    $result_getStartingClientId = $trip->getStartingClientId() == 2 ? "pass" : "fail";
    echo ("Test getStartingClientId(): " . $result_getStartingClientId . "<br/>");

    $result_getEndingClientId = $trip->getEndingClientId() == 1 ? "pass" : "fail";
    echo ("Test getEndingClientId(): " . $result_getEndingClientId . "<br/>");

    $result_getDate = $trip->getDate() == "2018-04-02 00:00:00" ? "pass" : "fail";
    echo ("Test getDate(): " . $result_getDate . "<br/>");


    $trip = new Trip($dbCon, 300);
    echo "<br/>Trip ID: 300 (DNE)<br/>";

    $result_getTripId = $trip->getTripId() == -1 ? "pass" : "fail";
    echo ("Test getTripId(): " . $result_getTripId . "<br/>");
?>
