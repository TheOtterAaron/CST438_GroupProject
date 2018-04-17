<?php

    class Client
    {

        private $m_clientId;
        private $m_name;
        private $m_addressId;

        public function __construct($clientId, $name, $addressId)
        {
            $this->m_clientId = $clientId;
            $this->m_name = $name;
            $this->m_addressId = $addressId;
        }

        public function getClientId()
        {
            return $this->m_clientId;
        }

        public function getName()
        {
            return $this->m_name;
        }

        public function setName($value)
        {
            $this->m_name = $value;
        }

        public function getAddressId()
        {
            return $this->m_addressId;
        }

        public function setAddressId($value)
        {
            $this->m_addressId = $value;
        }
    }

?>