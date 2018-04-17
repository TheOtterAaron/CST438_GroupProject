<?php

    require_once("Assertions.php");
    require_once("../Client.php");

    // Test creating a new client
    $client = new Client(
        1,
        "Advantage Metal Products",
        1);
    echo "Creating a new client<br/>";

    assertEqual($client->getClientId(), 1, "getClientId()");
    assertEqual($client->getName(), "Advantage Metal Products", "getName()");
    assertEqual($client->getAddressId(), 1, "getAddressId()");

    // Test mutating client
    $client->setName("Gordy's Garage");
    $client->setAddressId(3);
    echo "<br/>Mutating client<br/>";

    assertEqual($client->getClientId(), 1, "getClientId()");
    assertEqual($client->getName(), "Gordy's Garage", "getName()");
    assertEqual($client->getAddressId(), 3, "getAddressId()");

?>