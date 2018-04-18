<?php

    require_once("iMySqlStrategy.php");
    require_once("Client.php");

    class MySqlStrategyClient implements iMySqlStrategy
    {
        public function getTableName()
        {
            return "client";
        }

        public function getKeyName()
        {
            return "clientId";
        }

        public function executeCreationStrategy($clientData)
        {
            if ($clientData != NULL)
            {
                return new Client(
                    $clientData['clientId'],
                    $clientData['name'],
                    $clientData['addressId']
                );
            }

            return new Client(-1, "", -1);
        }

        public function executeBindingStrategy($client)
        {
            return array(
                "clientId" => $client->getClientId(),
                "name" => $client->getName(),
                "addressId" => $client->getAddressId()
            );
        }
    }

?>