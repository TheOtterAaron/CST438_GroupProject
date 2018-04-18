<?php

    require_once("iClientDao.php");
    require_once("GenericMySqlDao.php");
    require_once("MySqlStrategyClient.php");

    class ClientDaoMySql implements iClientDao
    {
        private $m_mySqlDao;

        public function __construct($dbCon)
        {
            $this->m_mySqlDao = new GenericMySqlDao($dbCon, new MySqlStrategyClient());
        }

        public function getClient($clientId)
        {
            return $this->m_mySqlDao->getObject($clientId);
        }

        public function getClients($clientIds)
        {
            return $this->m_mySqlDao->getObjects($clientIds);
        }

        public function addClient($client)
        {
            return $this->m_mySqlDao->addObject($client);
        }

        public function updateClient($client)
        {
            return $this->m_mySqlDao->updateObject($client);
        }

        public function deleteClient($clientId)
        {
            return $this->m_mySqlDao->deleteObject($clientId);
        }
    }

?>