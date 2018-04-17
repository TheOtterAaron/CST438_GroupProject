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
            return new Client(0, "", 0);
        }

        public function getClients($clientIds)
        {
            return array(
                new Client(0, "", 0),
                new Client(0, "", 0),
                new Client(0, "", 0)
            );
        }

        public function addClient($client)
        {
            return new Client(0, "", 0);
        }

        public function updateClient($client)
        {
            false;
        }

        public function deleteClient($clientId)
        {
            false;
        }
    }

?>