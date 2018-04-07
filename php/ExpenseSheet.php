<?php
    class Sheet
    {
        private $m_sheetId;
        private $m_name;
        private $m_dateCreated;
        
        function __construct($dbCon, $sheetId)
        {
            $this->m_sheetId = $sheetId;
            $sql = "SELECT * FROM expense_sheet WHERE sheetId = :sheetId";
            $stmt = $dbCon->prepare($sql);
            $stmt->execute(array(
                ":sheetId" => $this->m_sheetId
            ));
            $sheet = $stmt->fetch();
            if (!empty($sheet))
            {
                $this->m_sheetId = $sheetId;
                $this->m_name = $sheet['name'];
                $this->m_dateCreated = $sheet['dateCreated'];
            }
            else
            {
                $this->m_sheetId = -1;
            }
        }
        function getSheetId()
        {
            return $this->m_sheetId;
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