<?php

class Vue_Destinations_genre_type {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function getDestinationsByType($id_type) {
        print 'coucou';
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_destinations_genre_type where id_type=:id_type";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_type', $id_type);
            $resultset->execute();
            $this->_db->commit();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

    public function getAllDestinations() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_destinations_genre_type";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $this->_db->commit();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

}
