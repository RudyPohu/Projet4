<?php

namespace Model;

class Bdd{

    private $_db;

    // fonction permettant de se connecter à la BDD
    private function getBDD() {
        try {
            $this->_db = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
        }
        catch(\Exception $e) {
                die('Erreur : '.$e->getMessage());
        }
    }
}

