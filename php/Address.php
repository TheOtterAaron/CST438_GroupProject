<?php

    class Address
    {
        private $m_addressId;
        private $m_addressLine1;
        private $m_addressLine2;
        private $m_city;
        private $m_state;
        private $m_zip;

        public function __construct($addressId, $addressLine1, $addressLine2, $city, $state, $zip)
        {
            $this->m_addressId = $addressId;
            $this->m_addressLine1 = $addressLine1;
            $this->m_addressLine2 = $addressLine2;
            $this->m_city = $city;
            $this->m_state = $state;
            $this->m_zip = $zip;
        }

        public function getAddressId()
        {
            return $this->m_addressId;
        }

        public function getAddressLine1()
        {
            return $this->m_addressLine1;
        }

        public function setAddressLine1($value)
        {
            $this->m_addressLine1 = $value;
        }

        public function getAddressLine2()
        {
            return $this->m_addressLine2;
        }

        public function setAddressLine2($value)
        {
            $this->m_addressLine2 = $value;
        }

        public function getCity()
        {
            return $this->m_city;
        }

        public function setCity($value)
        {
            $this->m_city = $value;
        }

        public function getState()
        {
            return $this->m_state;
        }

        public function setState($value)
        {
            $this->m_state = $value;
        }

        public function getZip()
        {
            return $this->m_zip;
        }

        public function setZip($value)
        {
            $this->m_zip = $value;
        }
    }

?>