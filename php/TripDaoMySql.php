<?php

    require_once("iTripDao.php");

    class TripDaoMySql implements iTripDao
    {
        private $m_mySqlDao;

        public function __construct($dbCon)
        {

        }

        public function getTrip($tripId)
        {
            return new Trip(0, -1, -1, "1970-01-01 00:00:00");
        }

        public function getTrips($tripIds)
        {
            return array(
                new Trip(0, -1, -1, "1970-01-01 00:00:00"),
                new Trip(0, -1, -1, "1970-01-01 00:00:00"),
                new Trip(0, -1, -1, "1970-01-01 00:00:00")
            );
        }

        public function addTrip($trip)
        {
            return new Trip(0, -1, -1, "1970-01-01 00:00:00");
        }

        public function updateTrip($trip)
        {
            return false;
        }

        public function deleteTrip($tripId)
        {
            return false;
        }
    }

?>