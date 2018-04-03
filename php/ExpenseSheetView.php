<html>
<head>
</head>
<body>
<form id="calculate-mileage" action="ExpenseSheetView.php">
<button type="Submit">Calculate</button>

</form>
<?php
    function renderExpenseSheet()
    {
        echo "Miles: " + calculateTrips($sheetId);
    }

    function calculateTrips($sheetId)
    {
        //To be gathered from the trip database
        //Psuedo code
        /*
        $totalMiles = 0;
        for(Trip trip : TripController.getTrips())
        {
            totalMiles += findDistance(trip.getMileage())
        }*/
    }
?>
</body>
</html>