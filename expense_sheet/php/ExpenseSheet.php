<?php
    class Sheet
    {
        private $m_sheetid;
        private $m_name;
        private $m_dateCreated;
        
        function __construct($dbCon, $sheetId)
        {
            $this->$m_sheetid = $sheetId;
            $sql = "SELECT * FROM trip WHERE sheetId = :sheetId";
            $stmt = $dbCon->prepare($sql);
            $stmt->execute(array(
                ":sheetId" => $this->$m_sheetid
            ));
            $sheet = $stmt->fetch();
            if (!empty($sheet))
            {
                $this->m_name = $sheet['name'];
                $this->m_dateCreated; = $sheet['dateCreated'];
            }
            else
            {
                $this->m_sheetid = -1;
            }
        }
        function getSheetId()
        {
            return $this->$m_sheetid;
        }
        function getName()
        {
            return $this->m_name;
        }
        function getDateCreated()
        {
            return $this->m_dateCreated;
        }
    }
?>