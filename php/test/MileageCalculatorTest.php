<?php
    include('MileageCalculator.php');
    $calculated = calculateMileage("Disneyland Park", "Fisherman's Wharf, San Francisco, CA");
    echo("Calculated value: " . $calculated);
    echo("</br>");
    $rounded = round($calculated);
    echo("Rounded Value: " . $rounded);
    //Rounds to the nearest whole number
    //Using the same test that is implemented in the java portion of the code
    echo("</br>");
    echo("Test passed: " . ($rounded == 409));
    //If 0 the test failed if the value is 1 the test passed
?>