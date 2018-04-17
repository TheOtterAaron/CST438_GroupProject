<?php

	require_once("DbCon.php");
	require_once("ClientDaoMySql.php");
	require_once("AddressDaoMySql.php");

	$clientDao = new ClientDaoMySql($dbCon);
	$addressDao = new AddressDaoMySql($dbCon);

	$client = $clientDao->getClient(1);
	$address = $addressDao->getAddress($client->getAddressId());

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mileage Tracker - Viewing <?php echo $client->getName(); ?></title>
	</head>
	<body>
		<h1><?php echo $client->getName(); ?></h1>
		<p><?php echo $address->getAddressLine1(); ?></p>
		<?php
			if ($address->getAddressLine2() != "")
			{
				echo "<p>" . $address->getAddressLine2() / "</p>";
			}
		?>
		<p><?php
			echo $address->getCity() . 
				", " . $address->getState() .
				" " . $address->getZip();
		?></p>
	</body>
</html>