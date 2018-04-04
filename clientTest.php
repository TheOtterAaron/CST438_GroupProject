<?php

require_once("client.php");

$client = new Client(1);

$m_id = $client->getClientId();
$m_name = $client->getClientName();
$m_addressId = $client->getAddressId();



if($m_addressId == "1")
{
    print("Address ID Check Success\n");
}
else
{
    print("Address ID Check Fail\n");
}

if($m_name == "Advantage Metal Products")
{
    print("Client Name Check Success\n");
}
else
{
    print("Client Name Check Fail\n");
}

if($m_addressId == "1")
{
    print("Address ID Check Success\n");
}
else
{
    print("Address ID Check Fail\n");
}
