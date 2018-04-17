<?php

    require_once("iMySqlStrategy.php");
    require_once("Trip.php");

    class MySqlStrategyTrip implements iMySqlStrategy
    {
        public function getTableName()
        {
            return "trip";
        }

        public function getKeyName()
        {
            return "tripId";
        }

        public function executeCreationStrategy($tripData)
        {
            if ($tripData != NULL)
            {
                return new Trip(
                    $tripData['tripId'],
                    $tripData['startingClientId'],
                    $tripData['endingClientId'],
                    $tripData['date']
                );
            }

            return new Trip(-1, -1, -1, "1970-01-01 00:00:00");
        }

        public function executeBindingStrategy($trip)
        {
            return array(
                "tripId" => $trip->getTripId(),
                "startingClientId" => $trip->getStartingClientId(),
                "endingClientId" => $trip->getEndingClientId(),
                "date" => $trip->getDate()
            );
        }
    }

?>