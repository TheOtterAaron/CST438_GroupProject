<?php

    require_once("iMySqlStrategy.php");

    class GenericMySqlDao
    {
        private $m_dbCon;
        private $m_mySqlStrategy;
        private $m_table;
        private $m_key;

        public function __construct($dbCon, $mySqlStrategy)
        {
            $this->m_dbCon = $dbCon;
            $this->m_mySqlStrategy = $mySqlStrategy;
            $this->m_table = $mySqlStrategy->getTableName();
            $this->m_key = $mySqlStrategy->getKeyName();
        }

        private function prepareBindings($bindings)
        {
            $sqlBindings = array();
            for ($i = 0; $i < count($bindings); $i++)
            {
                $column = array_keys($bindings)[$i];
                $value = $bindings[$column];
                $sqlBindings[":" . $column] = $value;
            }
            
            return $sqlBindings;
        }

        public function getObject($objectId)
        {
            $sql = "SELECT * FROM " . $this->m_table . "
                    WHERE " . $this->m_key . " = :" . $this->m_key;
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":" . $this->m_key => $objectId
            ));
            $objectData = $stmt->fetch();

            if (!empty($objectData))
            {
                return $this->m_mySqlStrategy->executeCreationStrategy($objectData);
            }

            return $this->m_mySqlStrategy->executeCreationStrategy(NULL);
        }

        public function getObjects($objectIds)
        {
            $sql = "SELECT * FROM " . $this->m_table . "
                    WHERE " . $this->m_key . " IN (" .
                        str_repeat("?,", count($objectIds) - 1) . "?" .
                   ")";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute($objectIds);
            $rows = $stmt->fetchAll();

            $objects = array();
            foreach ($rows as $k => $row)
            {
                $objects[$k] = $this->m_mySqlStrategy->executeCreationStrategy($row);
            }

            return $objects;
        }

        public function addObject($object)
        {
            $bindings = $this->m_mySqlStrategy->executeBindingStrategy($object);
            $columns = array_keys($bindings);

            $sql = "INSERT INTO " . $this->m_table . " (" .
                        implode(",", $columns) .
                    ") VALUES (NULL, " .
                        ":" . implode(",:", array_slice($columns, 1)) .
                    ")";
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute($this->prepareBindings(array_slice($bindings, 1)));

            $bindings[$this->m_key] = $this->m_dbCon->lastInsertId();
            return $this->m_mySqlStrategy->executeCreationStrategy($bindings);
        }

        public function updateObject($object)
        {
            $bindings = $this->m_mySqlStrategy->executeBindingStrategy($object);
            $columns = array_keys($bindings);
            
            $setClause = array();
            foreach ($columns as $k => $column)
            {
                $setClause[$k] = $column . " = :" . $column;
            }

            try
            {
                $sql = "UPDATE " . $this->m_table . "
                        SET " . implode(",", $setClause) . "
                        WHERE " . $this->m_key . " = :" . $this->m_key;
                $stmt = $this->m_dbCon->prepare($sql);
                $stmt->execute($this->prepareBindings($bindings));
            }
            catch (Exception $e)
            {
                return false;
            }

            return true;
        }

        public function deleteObject($objectId)
        {
            $sql = "SELECT count(*) FROM " . $this->m_table . "
                    WHERE " . $this->m_key . " = :" . $this->m_key;
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":" . $this->m_key => $objectId
            ));
            $count = $stmt->fetch();
            if ($count["count(*)"] == 0)
            {
                return false;
            }

            $sql = "DELETE FROM " . $this->m_table . "
                    WHERE " . $this->m_key . " = :" . $this->m_key;
            $stmt = $this->m_dbCon->prepare($sql);
            $stmt->execute(array(
                ":" . $this->m_key => $objectId
            ));

            return true;
        }
    }

?>