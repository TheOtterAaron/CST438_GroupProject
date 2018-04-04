<?php

    require_once("Trip.php");

    class TripController
    {
        private $m_dbCon;

        function __construct($dbCon)
        {
            $this->m_dbCon = $dbCon;
        }

        function createTrip($startingClientId, $endingClientId, $date)
        {
            $sql = "INSERT INTO trip
                    (tripId, startingClientId, endingClientId, date)
                    VALUES
                    (NULL, :startingClientId, :endingClientId, :date)";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":startingClientId" => $startingClientId,
                ":endingClientId" => $endingClientId,
                ":date" => $date
            ));
            
            return new Trip($this->m_dbCon, $this->m_dbCon->lastInsertId());
        }

        function updateTrip($tripId, $startingClientId, $endingClientId, $date)
        {
            $sql = "UPDATE trip
                    SET startingClientId = :startingClientId,
                        endingClientId = :endingClientId,
                        date = :date
                    WHERE tripId = :tripId";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":tripId" => $tripId,
                ":startingClientId" => $startingClientId,
                ":endingClientId" => $endingClientId,
                ":date" => $date
            ));
            
            return new Trip($this->m_dbCon, $tripId);
        }

        function deleteTrip($tripId)
        {
            $sql = "DELETE FROM trip WHERE tripId = :tripId";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":tripId" => $tripId
            ));
        }
    }

?>