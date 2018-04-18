<?php

    interface iMySqlStrategy
    {
        public function getTableName();
        public function getKeyName();
        public function executeCreationStrategy($objectData);
        public function executeBindingStrategy($object);
    }

?>