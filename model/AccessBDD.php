<?php

namespace Model;

abstract class AccessBdd {

    protected $_db;

    // fonction permettant de se connecter à la BDD
    protected function getBDD() {
        try {
            $this->_db = new \PDO('mysql:host='.$_ENV["HOST"].';dbname='.$_ENV["BDD_NAME"].';charset=utf8', $_ENV["BDD_USER"], $_ENV["BDD_PASSWORD"]);
        }
        catch(\Exception $e) {
                die('Erreur : '.$e->getMessage());
        }
    }
}

