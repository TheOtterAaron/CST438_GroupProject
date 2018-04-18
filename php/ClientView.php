<?php

	require_once("DbCon.php");
	require_once("ClientDaoMySql.php");
	require_once("AddressDaoMySql.php");

	$clientDao = new ClientDaoMySql($dbCon);
	$addressDao = new AddressDaoMySql($dbCon);

	if (isset($_GET['clientId']))
	{
		$client = $clientDao->getClient($_GET['clientId']);

		if ($client->getClientId() == -1)
		{
			$error = "Client not found";
		}
		else
		{
			$address = $addressDao->getAddress($client->getAddressId());

			if ($address->getAddressId() == -1)
			{
				$error = "Address not found";
			}
		}
	}
	else
	{
		echo "Must provide a client ID";
		exit;
	}

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