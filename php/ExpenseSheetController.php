<?php
    require_once("ExpenseSheet.php");
    class SheetController
    {
        private $m_dbCon;
        function __construct($dbCon)
        {
            $this->m_dbCon = $dbCon;
        }
        function createSheet($name, $dateCreated)
        {
            $sql = "INSERT INTO expense_sheet
                    (sheetId, name, dateCreated)
                    VALUES
                    (NULL, :name, :dateCreated)";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":name" => $name,
                ":dateCreated" => $dateCreated
            ));
            
            return new Sheet($this->m_dbCon, $this->m_dbCon->lastInsertId());
        }
        function updateSheet($sheetId, $name, $dateCreated)
        {
            $sql = "UPDATE expense_sheet
                    SET name = :name,
                        dateCreated = :dateCreated
                    WHERE sheetId = :sheetId";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":sheetId" => $sheetId,
                ":name" => $name,
                ":dateCreated" => $dateCreated
            ));
            
            return new Sheet($this->m_dbCon, $sheetId);
        }
        function deleteSheet($sheetId)
        {
            $sql = "DELETE FROM expenseSheet WHERE sheetId = :sheetId";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":sheetId" => $sheetId
            ));
        }
    }
?>