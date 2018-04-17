<?php

    require_once("Client.php");

    interface iClientDao
    {
        public function getClient($clientId);
        public function getClients($clientIds);
        public function addClient($client);
        public function updateClient($client);
        public function deleteClient($clientId);
    }

?>