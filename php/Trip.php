<?php

    class Trip
    {
        private $m_tripId;
        private $m_startingClientId;
        private $m_endingClientId;
        private $m_date;

        function __construct($dbCon, $tripId)
        {

            $sql = "SELECT * FROM trip WHERE tripId = :tripId;";
            $stmt = $dbCon->prepare($sql);
            $stmt->execute(array(
                ":tripId" => $tripId
            ));
            $trip = $stmt->fetch();

            if (!empty($trip))
            {
                $this->m_tripId = $tripId;
                $this->m_startingClientId = $trip['startingClientId'];
                $this->m_endingClientId = $trip['endingClientId'];
                $this->m_date = $trip['date'];
            }
            else
            {
                $this->m_tripId = -1;
            }
        }

        function getTripId()
        {
            return $this->m_tripId;
        }

        function getStartingClientId()
        {
            return $this->m_startingClientId;
        }

        function getEndingClientId()
        {
            return $this->m_endingClientId;
        }

        function getDate()
        {
            return $this->m_date;
        }
    }

?>