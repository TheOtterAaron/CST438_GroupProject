<?php

require_once("../Address.php");

$address = new Address(1);

$m_addressId = $address->getAddressId();
$m_addressLine1 = $address->getAddressLine1();
$m_addressLine2 = $address->getAddressLine2();
$m_city = $address->getCity();
$m_state = $address->getState();
$m_zip = $address->getZip();


if($m_addressId == "1")
{
    print("Address ID Check Success\n");
}
else
{
    print("Address ID Check Fail\n");
}

if($m_addressLine1 == "7855 Southfront Road")
{
    print("Address Line 1 Check Success\n");
}
else
{
    print("Address Line 1 Check Fail\n");
}

if($m_addressLine2 == "")
{
    print("Address Line 2 Check Success\n");
}
else
{
    print("Address Line 2 Check Fail\n");
}

if($m_city == "Livermore")
{
    print("City Check Success\n");
}
else
{
    print("City Check Fail\n");
}

if($m_state == "CA")
{
    print("State Check Success\n");
}
else
{
    print("State Check Fail\n");
}

if($m_zip == "94551")
{
    print("Zip Check Success\n");
}
else
{
    print("Zip Check Fail\n");
}

