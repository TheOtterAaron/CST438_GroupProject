<?php
    require_once("Sheet.php");
    class SheetController
    {
        private $m_dbCon;
        function __construct($dbCon)
        {
            $this->m_dbCon = $dbCon;
        }
        function createSheet($name, $dateCreated)
        {
            $sql = "INSERT INTO expenseSheet
                    (sheetid, name, dateCreated)
                    VALUES
                    (NULL, :name, :dateCreated)";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":name" => $name,
                ":dateCreated" => $dateCreated
            ));
            
            return new Sheet($this->m_dbCon, $this->m_dbCon->lastInsertId());
        }
        function updateSheet($sheetid, $name, $dateCreated)
        {
            $sql = "UPDATE expenseSheet
                    SET name = :name,
                        dateCreated = :dateCreated
                    WHERE sheetid = :sheetid";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":sheetid" => $sheetid,
                ":name" => $name,
                ":dateCreated" => $dateCreated
            ));
            
            return new Sheet($this->m_dbCon, $sheetid);
        }
        function deleteSheet($sheetid)
        {
            $sql = "DELETE FROM expenseSheet WHERE sheetid = :sheetid";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":sheetid" => $sheetid
            ));
        }
    }
?>