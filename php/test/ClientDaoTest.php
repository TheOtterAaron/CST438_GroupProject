<?php

    require_once("Assertions.php");
    require_once("../DbCon.php");
    require_once("../ClientDaoMySql.php");

    $clientDao = new ClientDaoMySql($dbCon);

    // Test fetching client 1
    echo "Fetching client 1<br/>";

    $client = $clientDao->getClient(1);
    assertEqual($client->getClientId(), 1, "getClientId()");
    assertEqual($client->getName(), "Advantage Metal Products", "getName()");
    assertEqual($client->getAddressId(), 1, "getAddressId()");

    // Test fetching client 2
    echo "<br/>Fetching client 2<br/>";

    $client = $clientDao->getClient(2);
    assertEqual($client->getClientId(), 2, "getClientId()");
    assertEqual($client->getName(), "Siemens PLM", "getName()");
    assertEqual($client->getAddressId(), 2, "getAddressId()");

    // Test fetching client 500 (DNE)
    echo "<br/>Fetching client 500 (DNE)<br/>";

    $client = $clientDao->getClient(500);
    assertEqual($client->getClientId(), -1, "getClientId()");

    // Test adding client
    echo "<br/>Adding client<br/>";

    $newClient = new Client(
        NULL,
        "Siemens AG",
        2);
    $savedClient = $clientDao->addClient($newClient);
    assertEqual($savedClient->getClientId(), $dbCon->lastInsertId(), "getClientId()" . $savedClient->getClientId());

    // Test fetching added client
    echo "<br/>Fetching added client<br/>";

    $client = $clientDao->getClient($savedClient->getClientId());
    assertEqual($client->getClientId(), $savedClient->getClientId(), "getClientId()");
    assertEqual($client->getName(), "Siemens AG", "getName()");
    assertEqual($client->getAddressId(), 2, "getAddressId()");

    // Test fetching multiple clients
    echo "<br/>Fetching multiple clients<br/>";

    $clients = $clientDao->getClients(array(1, 2, $savedClient->getClientId()));
    assertEqual($clients[0]->getName(), "Advantage Metal Products", "getName()");
    assertEqual($clients[1]->getAddressId(), 2, "getAddressId()");
    assertEqual($clients[2]->getName(), "Siemens AG", "getName()");

    // Test updating client
    echo "<br/>Updating client<br/>";

    $client->setName("Advantage Metal");
    $client->setAddressId(1);
    assertEqual($clientDao->updateClient($client), true, "updateClient()");

    // Test fetching updated client
    echo "<br/>Fetching updated client<br/>";

    $client = $clientDao->getClient($savedClient->getClientId());
    assertEqual($client->getClientId(), $savedClient->getClientId(), "getClientId()");
    assertEqual($client->getName(), "Advantage Metal", "getName()");
    assertEqual($client->getAddressId(), 1, "getAddressId()");

    // Test deleting client
    echo "<br/>Deleting client<br/>";

    assertEqual($clientDao->deleteClient($savedClient->getClientId()), true, "deleteClient()");
    $client = $clientDao->getClient($savedClient->getClientId());
    assertEqual($client->getClientId(), -1, "getClientId()");
    assertEqual($clientDao->deleteClient($savedClient->getClientId()), false, "deleteClient()");

?>