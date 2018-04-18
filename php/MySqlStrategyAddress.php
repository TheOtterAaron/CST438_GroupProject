<?php

    require_once("iMySqlStrategy.php");
    require_once("Address.php");

    class MySqlStrategyAddress implements iMySqlStrategy
    {
        public function getTableName()
        {
            return "address";
        }

        public function getKeyName()
        {
            return "addressId";
        }

        public function executeCreationStrategy($addressData)
        {
            if ($addressData != NULL)
            {
                return new Address(
                    $addressData['addressId'],
                    $addressData['addressLine1'],
                    $addressData['addressLine2'],
                    $addressData['city'],
                    $addressData['state'],
                    $addressData['zip']
                );
            }

            return new Address(-1, "", "", "", "", 0);
        }

        public function executeBindingStrategy($address)
        {
            return array(
                "addressId" => $address->getAddressId(),
                "addressLine1" => $address->getAddressLine1(),
                "addressLine2" => $address->getAddressLine2(),
                "city" => $address->getCity(),
                "state" => $address->getState(),
                "zip" => $address->getZip()
            );
        }
    }

?>