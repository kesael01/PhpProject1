<?php

    class DestinationsDB extends Destinations {


        private $_db;
        private $_Array = array();

        public function __construct($cnx) {
            $this->_db = $cnx;
        }

        public function getAllDestinations() {
            $query = "select * from Destinations";
            try {
                $resultset = $this->_db->prepare($query);
                $resultset->execute();
            } catch (PDOException $e) {
                print $e->getMessage();
            }

            while ($data = $resultset->fetch()) {
                try {
                    //$_clientArray[] = new Client ($data);
                    $_voyagesImagesArray[] = $data;
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
            return $_voyagesImagesArray;
        }
    }