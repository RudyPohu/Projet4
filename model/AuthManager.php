<?php 

namespace Model;

class AuthManager extends AccessBdd {

    // fonction permettant de récupérer le user et le mdp en BDD
    public function getUser($pseudo) {
        $this->getBDD();
        $req = $this->_db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $resultat = $req->fetch(\PDO::FETCH_ASSOC);
        $user = new User($resultat);
        return $user;
    }
}