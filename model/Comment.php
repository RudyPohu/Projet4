<?php

namespace Model;

class Comment {
	private $_id;
	private $_id_ticket;
	private $_auteur;
	private $_commentaire;
	private $_date;
	private $_reported;

	public function __construct(array $donnees) {
		foreach($donnees as $key =>$donnee) {
			$method = 'set'.ucfirst($key);
			$this->$method($donnee);
		}
	}

	// guetteurs
	public function id() {
		return $this->_id;
	}

	public function id_ticket() {
		return $this->_id_ticket;
	}

	public function auteur() {
		return $this->_auteur;
	}

	public function commentaire() {
		return $this->_commentaire;
	}

	public function getDate() {
		return $this->_date;
	}

	public function reported() {
		return (int)$this->_reported;
	}


	// setteurs
	public function setId($id) {
		$this->_id = $id;
	}

	public function setId_ticket($id_ticket) {
		$this->_id_ticket = $id_ticket;
	}

	public function setAuteur($auteur) {
		$this->_auteur = $auteur;
	}

	public function setCommentaire($commentaire) { 
		$this->_commentaire = $commentaire;
	}

	public function setDate($date) {
		$this->_date = $date;
	}

	public function setReported($reported) {
		$this->_reported = $reported;
	}

}