<?php

namespace Model;

require 'AccessBDD.php';

use Model\{Ticket, Bdd};

class TicketManager
 {


   
    // fonction permettant l'affichage des chapitres, limite de 10
	public function getTickets() {
		$this->getBDD();
		$datas = [];
		$q = $this->_db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date FROM tickets ORDER BY date_creation LIMIT 0, 10');
		$tickets = $q->fetchAll(\PDO::FETCH_ASSOC);
		$q->closeCursor();
		foreach($tickets as $ticket) {
		 	$thisticket = new Ticket($ticket);
		 	array_push($datas, $thisticket);
		}
		return $datas;
	}

	// fonction permettant l'affichage d'un chapitre en fonction de l'id
	public function getTicket($id) {
		$this->getBDD();
		$req = $this->_db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date FROM tickets WHERE id = ?');
		$req->execute(array($id));
		$thisdata = $req->fetch(\PDO::FETCH_ASSOC);
		$ticket = new Ticket($thisdata);
		return $ticket;
	}

	// fonction permettant l'enregistrement d'un nouveau chapitre en BDD
	public function storeTicket($titre, $contenu) {
			// Insertion en base de données
			$this->getBDD();
			$req = $this->_db->prepare('INSERT INTO tickets (titre, contenu, date_creation) VALUES(?, ?, NOW())');
			$req->execute(array($titre, $contenu));
			$req->closeCursor();
	}

	// fonction permettant la modification d'un chapitre en BDD
	public function updateTicket($id, $titre, $contenu) {
		$this->getBDD();
		$req = $this->_db->prepare('UPDATE tickets SET titre = ?, contenu = ?  WHERE id = ?');
		$req->execute(array($titre, $contenu, $id));
		$req->closeCursor();
	}

	// fonction permettant la suppression d'un chapitre en BDD
	public function deleteTicket($id) {
		$this->getBDD();
		$req = $this->_db->prepare('DELETE FROM tickets WHERE id = ?');
		$req->execute(array($id));
		$req->closeCursor();
	}
} 