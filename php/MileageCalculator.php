<?php
	require_once('Address.php');
	function stringifyAddress($address) //Currently only addressLine1 is supported
	{
		$lineOne = $address->getAddressLine1();
		$city = $address->getCity();
		$state = $address->getState();
		$zipCode = $address->getZip();
		$out = $lineOne . ", " . $city . ", " . $state . " " . $zipCode;
		return $out;
	}
	
	function calculateMileage($origin, $destination) //Address objects
	{
		$originAddress = stringifyAddress($origin);
		$destinationAddress = stringifyAddress($destination);
        $url = "http://127.0.0.1:4567/mapsapi?origin=" . urlencode($originAddress) . "&destination=" . urlencode($destinationAddress);
		$curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $exec = curl_exec($curl);
        curl_close($curl);
        return $exec;
	}
?>