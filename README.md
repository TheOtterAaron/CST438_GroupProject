# Mileage Tracker
### Group Project for CST 438 @ CSU Monterey Bay

This is a proof-of-concept of a mileage tracker application that uses Google Map's public API to calculate the mileage of a trip, where a trip is defined via starting and ending client addresses.

## Screenshots

Below are screenshots of the application running in a local development environment.

![alt text](https://github.com/TheOtterAaron/CST438_GroupProject/blob/master/img/AllTrips.png "Viewing All Trips")

A view of all the trips in the database.  Mechanisms are in place to allow easily limiting this to only trips associated with a particular user or expense sheet.

![alt text](https://github.com/TheOtterAaron/CST438_GroupProject/blob/master/img/TripView.png "Viewing A Single Trip")

A detailed view of a single trip.  Note the mileage calculation near the bottom of the details.

![alt text](https://github.com/TheOtterAaron/CST438_GroupProject/blob/master/img/ClientView.png "Viewing A Client")

A detailed view of a client, including full address information.

## Future Work

Although not present in the above screenshots, full CRUD operations are supported for Trips, Clients and Addresses.  With minimal frontend work this functionality could be exposed to users to allow adding new clients, creating new trips from those clients, deleting trips, etc.

The addition of user authentication and sessions in combination with the aforementioned frontend work would yield an application that allows users to easily track their mileage as they travel from one client to the next.  This data could then be exported to a CSV file or similar for use in Excel and other spreadsheet / budgeting applications.