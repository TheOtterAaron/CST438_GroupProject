<?php

    require_once("Assertions.php");
    require_once("../DbCon.php");
    require_once("../AddressDaoMySql.php");

    $addressDao = new AddressDaoMySql($dbCon);

    // Test fetching address 1
    echo "Fetching address 1<br/>";

    $address = $addressDao->getAddress(1);
    assertEqual($address->getAddressId(), 1, "getAddressId()");
    assertEqual($address->getAddressLine1(), "7855 Southfront Road", "getAddressLine1()");
    assertEqual($address->getAddressLine2(), "", "getAddressLine2()");
    assertEqual($address->getCity(), "Livermore", "getCity()");
    assertEqual($address->getState(), "CA", "getState()");
    assertEqual($address->getZip(), 94551, "getZip()");

    // Test fetching address 2
    echo "<br/>Fetching address 2<br/>";

    $address = $addressDao->getAddress(2);
    assertEqual($address->getAddressId(), 2, "getAddressId()");
    assertEqual($address->getAddressLine1(), "10824 Hope Street", "getAddressLine1()");
    assertEqual($address->getAddressLine2(), "", "getAddressLine2()");
    assertEqual($address->getCity(), "Cypress", "getCity()");
    assertEqual($address->getState(), "CA", "getState()");
    assertEqual($address->getZip(), 90630, "getZip()");

    // Test fetching address 500 (DNE)
    echo "<br/>Fetching address 500 (DNE)<br/>";

    $address = $addressDao->getAddress(500);
    assertEqual($address->getAddressId(), -1, "getAddressId()");

    // Test adding address
    echo "<br/>Adding address<br/>";

    $newAddress = new Address(
        NULL,
        "123 Imaginary Lane",
        "Unit 32",
        "New York",
        "NY",
        12345);
    $savedAddress = $addressDao->addAddress($newAddress);
    assertEqual($savedAddress->getAddressId(), $dbCon->lastInsertId(), "getAddressId()" . $savedAddress->getAddressId());

    // Test fetching added address
    echo "<br/>Fetching added address<br/>";

    $address = $addressDao->getAddress($savedAddress->getAddressId());
    assertEqual($address->getAddressId(), $savedAddress->getAddressId(), "getAddressId()");
    assertEqual($address->getAddressLine1(), "123 Imaginary Lane", "getAddressLine1()");
    assertEqual($address->getAddressLine2(), "Unit 32", "getAddressLine2()");
    assertEqual($address->getCity(), "New York", "getCity()");
    assertEqual($address->getState(), "NY", "getState()");
    assertEqual($address->getZip(), 12345, "getZip()");

    // Test updating address
    echo "<br/>Updating address<br/>";

    $address->setAddressLine1("456 Fantasy Road");
    $address->setAddressLine2("Apt 64");
    $address->setCity("Los Angeles");
    $address->setState("CA");
    $address->setZip(90210);
    assertEqual($addressDao->updateAddress($address), true, "updateAddress()");
    
    // Test fetching updated address
    echo "<br/>Fetching updated address<br/>";

    $address = $addressDao->getAddress($savedAddress->getAddressId());
    assertEqual($address->getAddressId(), $savedAddress->getAddressId(), "getAddressId()");
    assertEqual($address->getAddressLine1(), "456 Fantasy Road", "getAddressLine1()");
    assertEqual($address->getAddressLine2(), "Apt 64", "getAddressLine2()");
    assertEqual($address->getCity(), "Los Angeles", "getCity()");
    assertEqual($address->getState(), "CA", "getState()");
    assertEqual($address->getZip(), 90210, "getZip()");

    // Test deleting address
    echo "<br/>Deleting address<br/>";

    assertEqual($addressDao->deleteAddress($savedAddress->getAddressId()), true, "deleteAddress()");
    $address = $addressDao->getAddress($savedAddress->getAddressId());
    assertEqual($address->getAddressId(), -1, "getAddressId()");
    assertEqual($addressDao->deleteAddress($savedAddress->getAddressId()), false, "deleteAddress()");

?>