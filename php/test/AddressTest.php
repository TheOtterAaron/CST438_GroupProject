<?php

    require_once("Assertions.php");
    require_once("../Address.php");

    // Test creating a new address
    $address = new Address(
        1,
        "123 Imaginary Lane",
        "Unit 32",
        "New York",
        "NY",
        12345);
    echo "Create new address<br/>";

    assertEqual($address->getAddressId(), 1, "getAddressId()");
    assertEqual($address->getAddressLine1(), "123 Imaginary Lane", "getAddressLine1()");
    assertEqual($address->getAddressLine2(), "Unit 32", "getAddressLine2()");
    assertEqual($address->getCity(), "New York", "getCity()");
    assertEqual($address->getState(), "NY", "getState()");
    assertEqual($address->getZip(), 12345, "getZip()");

    // Test address mutators
    $address->setAddressLine1("456 Fantasy Road");
    $address->setAddressLine2("Apt 64");
    $address->setCity("Los Angeles");
    $address->setState("CA");
    $address->setZip(90210);
    echo "<br/>Mutate address<br/>";

    assertEqual($address->getAddressId(), 1, "getAddressId()");
    assertEqual($address->getAddressLine1(), "456 Fantasy Road", "getAddressLine1()");
    assertEqual($address->getAddressLine2(), "Apt 64", "getAddressLine2()");
    assertEqual($address->getCity(), "Los Angeles", "getCity()");
    assertEqual($address->getState(), "CA", "getState()");
    assertEqual($address->getZip(), 90210, "getZip()");

?>