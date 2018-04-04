<?php
require 'db_connection.php';

class Address
{

    var $m_addressId;
    var $m_addressLine1;
    var $m_addressLine2;
    var $m_city;
    var $m_state;
    var $m_zip;

    function __construct($addressId)
    {

        global $dbConn;
        $sql = "SELECT addressId, addressLine1, addressLine2, city, state, zip FROM address WHERE addressId = $addressId";
        $stmt = $dbConn->prepare($sql);
        print_r($stmt);
        $stmt -> execute();
        $result = $stmt -> fetch();
        $this->m_addressId = $result["addressId"];
        $this->m_addressLine1 = $result["addressLine1"];
        $this->m_addressLine2 = $result["addressLine2"];
        $this->m_city = $result["city"];
        $this->m_zip = $result["zip"];
        //print_r($result);
        return;

    }

    function getAddressId()
    {
        return $this->m_addressId;
    }

    function getAddressLine1()
    {
        return $this->m_addressLine1;
    }

    function getAddressLine2()
    {
        return $this->m_addressLine2;
    }

    function getCity()
    {
        return $this->m_city;
    }

    function getState()
    {
        return $this->m_state;
    }

    function getZip()
    {
        return $this->m_zip;
    }

}

$address = new Address(1);
print_r($address);