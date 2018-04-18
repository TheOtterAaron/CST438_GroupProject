<?php

    require_once("Trip.php");

    interface iTripDao
    {
        public function getTrip($tripId);
        public function getTrips($tripIds);
        public function addTrip($trip);
        public function updateTrip($trip);
        public function deleteTrip($trip);
    }

?>