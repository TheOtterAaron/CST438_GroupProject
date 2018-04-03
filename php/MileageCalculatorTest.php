<?php
    include('MileageCalculator.php');
    $calculated = calculateMileage("Disneyland Park", "Fisherman's Wharf, San Francisco, CA");
    echo("Calculated value: " . $calculated);
    echo("</br>");
    $rounded = round($calculated);
    echo("Rounded Value: " . $rounded);
    echo("</br>");
    echo("Test passed: " . ($rounded == 409));
?>