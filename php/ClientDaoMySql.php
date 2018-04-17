<?php

    require_once("iClientDao.php");

    class ClientDaoMySql implements iClientDao
    {
        private $m_dbCon;

        public function __construct($dbCon)
        {
            $this->m_dbCon = $dbCon;
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