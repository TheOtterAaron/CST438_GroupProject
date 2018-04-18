<?php
require_once("DbCon.php");
require_once("TripDaoMySql.php");
require_once("TripViewFactory.php");

session_start();

function fetchAllTrips($dbCon)
{
    $tripDao = new TripDaoMySql($dbCon);
    return $tripDao->getTrips(array(
        1, 2, 3, 4, 5, 6,
        7, 8, 9, 10, 11, 12
    ));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Trips</title>
</head>

<body>
<div id="wrapper">
    <table>
        <tr>
            <th>Trip</th>
        </tr>
        <?php
            $tripViewLineItem = new TripViewLineItem();

            $trips = fetchAllTrips($dbCon);

            for ($i = 0; $i < count($trips); $i++)
            {
                $tripViewLineItem->renderTrip($dbCon, $trips[$i]);
            }
        ?>
    </table>
</div>
</body>
</html>