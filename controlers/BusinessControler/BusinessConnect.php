<?php
    if(!defined("__root")) {
        require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
    }
    include __root . "models/BusinessModel.php";

    class AddressConnect
    {
        private $_db;

        public function __construct($dbConnection)
        {
             $this->_db = $dbConnection;
        }

        public function getAddresses()
        {
            $allBusinesses = array();
            $sqlQuery = "SELECT * FROM business;";
            $pdostmt = $this->_db->prepare($sqlQuery);
            $pdostmt -> execute();
            $results = $pdostmt -> fetchAll();
            foreach ($results as $result) {
                $busniess = new BusinessModel($result);
                array_push($allBusinesses, $business);
            }
            return $allAddresses;
        }
    }
?>