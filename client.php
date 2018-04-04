<?php
require 'db_connection.php';


class Client
{

    var $m_id;
    var $m_name;
    var $m_addressId;

    function __construct($clientId)
    {
        global $dbConn;
        $sql = "SELECT clientId, name, addressId FROM client WHERE clientId = $clientId";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $result = $stmt -> fetch();
        $this->m_id = $result["clientId"];
        $this->m_name = $result["name"];
        $this->m_addressId = $result["addressId"];
        //print_r($result);
        return $result;

    }

    function getClientName()
    {
        return $this->m_name;
    }
}

$client = new Client(1);
print_r($client);