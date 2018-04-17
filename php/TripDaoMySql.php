<?php

    require_once("iTripDao.php");
    require_once("GenericMySqlDao.php");
    require_once("MySqlStrategyTrip.php");

    class TripDaoMySql implements iTripDao
    {
        private $m_mySqlDao;

        public function __construct($dbCon)
        {
            $this->m_mySqlDao = new GenericMySqlDao($dbCon, new MySqlStrategyTrip());
        }

        public function getTrip($tripId)
        {
            return $this->m_mySqlDao->getObject($tripId);
        }

        public function getTrips($tripIds)
        {
            return $this->m_mySqlDao->getObjects($tripIds);
        }

        public function addTrip($trip)
        {
            return $this->m_mySqlDao->addObject($trip);
        }

        public function updateTrip($trip)
        {
            return $this->m_mySqlDao->updateObject($trip);
        }

        public function deleteTrip($tripId)
        {
            return $this->m_mySqlDao->deleteObject($tripId);
        }
    }

?>