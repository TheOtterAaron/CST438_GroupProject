<?php

    class Trip
    {
        private $m_tripId;
        private $m_startingClientId;
        private $m_endingClientId;
        private $m_date;

        public function __construct($tripId, $startingClientId, $endingClientId, $date)
        {
            $this->m_tripId = $tripId;
            $this->m_startingClientId = $startingClientId;
            $this->m_endingClientId = $endingClientId;
            $this->m_date = $date;
        }

        public function getTripId()
        {
            return $this->m_tripId;
        }

        public function getStartingClientId()
        {
            return $this->m_startingClientId;
        }

        public function setStartingClientId($value)
        {
            $this->m_startingClientId = $value;
        } 

        public function getEndingClientId()
        {
            return $this->m_endingClientId;
        }

        public function setEndingClientId($value)
        {
            $this->m_endingClientId = $value;
        }

        public function getDate()
        {
            return $this->m_date;
        }

        public function setDate($value)
        {
            $this->m_date = $value;
        }
    }

?>