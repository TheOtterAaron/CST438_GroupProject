<?php

    require_once("Address.php");

    interface iAddressDao
    {
        public function getAddress($addressId);
        public function getAddresses($addressIds);
        public function addAddress($address);
        public function updateAddress($address);
        public function deleteAddress($addressId);
    }

?>