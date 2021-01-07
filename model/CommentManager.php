<?php

namespace Model;

class CommentManager
{

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
   
	// fonction permettant l'affichage des commentaires associés à un chapitre
	public function getComments($id) {
		$this->getBDD();
		$donnees = [];
		$q = $this->_db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date, reported FROM blog_commentaires WHERE id_ticket = ?');
		$q->execute(array($id));
		$comments = $q->fetchAll(\PDO::FETCH_ASSOC);
		$q->closeCursor();
		foreach($comments as $comment) {
		  	$donnees[] = new Comment($comment);
		}
		return $donnees;
	}

	// fonction permettant l'enregistrement d'un nouveau commentaire en BDD
	public function store($id_ticket, $auteur, $commentaire) {
		$this->getBDD();
		$req = $this->_db->prepare('INSERT INTO blog_commentaires (id_ticket, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
		$req->execute(array($id_ticket, $auteur, $commentaire));
		$req->closeCursor();
	}

	// fonction permettant de signaler un commentaire en BDD
	public function report($id)	{
		$this->getBDD();
		$req = $this->_db->prepare('UPDATE blog_commentaires SET reported=1 WHERE id = ?');
		$req->execute(array($id));
		$req->closeCursor();
	}

	// fonction permettant de valider un commentaire signalé 
	public function unreport($id) {
		$this->getBDD();
		$req = $this->_db->prepare('UPDATE blog_commentaires SET reported=0 WHERE id = ?');
		$req->execute(array($id));
		$req->closeCursor();
	}

	// fonction permettant d'afficher tous les commentaires signalés dans le dashboard
	public function reportedComments() {
		$this->getBDD();
		$donnees = [];
		$q = $this->_db->query('SELECT id, id_ticket, auteur, commentaire, reported, DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date FROM blog_commentaires WHERE reported = 1');
		$comments = $q->fetchAll(\PDO::FETCH_ASSOC);
		$q->closeCursor();
		foreach($comments as $comment) {
		  	$donnees[] = new Comment($comment);
		}
		return $donnees;
	}

	// fonction permettant de supprimer un commentaire depuis le dashboard
	public function deleteReport($id) {
		$this->getBDD();
		$req = $this->_db->prepare('DELETE FROM blog_commentaires WHERE id = ?');
		$req->execute(array($id));
		$req->closeCursor();
	}

} 