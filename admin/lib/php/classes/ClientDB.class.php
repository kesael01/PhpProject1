<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function addClient($data) {
        //$_db->beginTransaction();
        try {
            /*
              $query="insert into client ";
              $query.=" (nom_client,email_client,password_client,";
              $query.="adresse,numero,localite,cp)";
              $query.=" values (:nom_client,:email_client,";
              $query.=":password_client,:adresse,:numero,:localite,:cp)";
             * 
             */
            $query = "select ajouter_client(:nom,:email,:password,:adresse,:numero,:localite,:cp) as retour";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom']);
            $resultset->bindValue(':email', $data['email1']);
            $resultset->bindValue(':password', $data['password']);
            $resultset->bindValue(':adresse', $data['adresse']);
            $resultset->bindValue(':numero', $data['numero']);
            $resultset->bindValue(':localite', $data['localite']);
            $resultset->bindValue(':cp', $data['codepostal']);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion " . $e->getMessage();
        }
        //$_db->commit();
    }

    public function getClient($email, $password) {
        $query = "select * from client where email_client=:email1 and password_client=:password";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email1', $email);
            $resultset->bindValue(':password', $password);

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                // nous n'employerons pas d'objet, afin de faciliter la conversion en Json dans le 
                //fichier ajax ajaxRechercheClient.php
                $_array[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_array;
    }

}
