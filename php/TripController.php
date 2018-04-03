<?php

    require_once("Trip.php");

    class TripController
    {
        private $m_dbCon;

        function __construct($dbCon)
        {
            $this->m_dbCon = $dbCon;
        }

        function createTrip($startingClientId, $endingClientId, $date=NULL)
        {
            return new Trip($this->m_dbCon, 1);
        }

        function updateTrip($tripId, $startingClientId, $endingClientId, $date=NULL)
        {
            return new Trip($this->m_dbCon, 1);
        }

        function deleteTrip($tripId)
        {
            
        }
    }

?>