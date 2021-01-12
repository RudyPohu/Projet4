<?php 

namespace Model;

class AuthManager {
   
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

    // fonction permettant de récupérer le user et le mdp en BDD
    public function getUser($username) {
        $this->getBDD();

        $req = $this->_db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $req->execute(array($username));
        $resultat = $req->fetch(\PDO::FETCH_ASSOC);
        $user = new User($resultat);
        return $user;
    }
}