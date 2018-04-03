<?php
	function calculateMileage($origin, $destination)
	{
        $url = "http://127.0.0.1:4567/mapsapi?origin=" . urlencode($origin) . "&destination=" . urlencode($destination);
		$curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $exec = curl_exec($curl);
        curl_close($curl);
        return $exec;
	}
?>