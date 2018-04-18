<?php

    require_once("iAddressDao.php");
    require_once("GenericMySqlDao.php");
    require_once("MySqlStrategyAddress.php");

    class AddressDaoMySql implements iAddressDao
    {
        private $m_mySqlDao;

        public function __construct($dbCon)
        {
            $this->m_mySqlDao = new GenericMySqlDao($dbCon, new MySqlStrategyAddress());
        }

        public function getAddress($addressId)
        {
            return $this->m_mySqlDao->getObject($addressId);
        }

        public function getAddresses($addressIds)
        {
            return $this->m_mySqlDao->getObjects($addressIds);
        }

        public function addAddress($address)
        {
            return $this->m_mySqlDao->addObject($address);
        }

        public function updateAddress($address)
        {
            return $this->m_mySqlDao->updateObject($address);
        }

        public function deleteAddress($addressId)
        {
            return $this->m_mySqlDao->deleteObject($addressId);
        }
    }

?>