<html>
<head>
</head>
<body>
<p>Calculates the distance for the client, methods are currently stubbed in for demonstration purposes</p>
<form id="calculate-mileage" method="post" action="ExpenseSheetView.php">
<button type="submit" name="calculate">Calculate</button>

</form>
<?php
    if(isset($_POST['calculate']))
    {
        renderExpenseSheet();
    }

    function renderExpenseSheet()
    {
        $sheetId = 0; //To be passed later
        $calculated = calculateTrips($sheetId);
        echo("Miles: " . $calculated);
    }

    function calculateTrips($sheetId)
    {
        include('MileageCalculator.php');
        $calculated = calculateMileage("Disneyland Park", "Fisherman's Wharf, San Francisco, CA");
        return $calculated;
        /*This will have to be implemented later but its a proof of concept that at least one
          trip can be calculated.
        */
        //To be gathered from the trip database
        //Psuedo code
        /*
        require 'TripController';
        $totalMiles = 0;
        for(Trip trip : TripController.getTrips())
        {
            totalMiles += findDistance(trip.getMileage())
        }*/
    }

?>
</body>
</html>