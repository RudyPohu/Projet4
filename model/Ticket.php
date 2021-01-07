<?php

namespace Model;

// use Model\{frontController,TicketManager};

class Ticket 
{
	private $_id;
	private $_titre;
	private $_contenu;
	private $_date;


	public function __construct(array $datas) {
		foreach($datas as $key =>$data) {
			$method = 'set'.ucfirst($key);	
			$this->$method($data); 
		}
	}

	// guetteurs
	public function id()
	{
		return $this->_id;
	}

	public function titre()
	{
		return $this->_titre;
	}

	public function contenu()
	{
		return $this->_contenu;
	}

	public function getDate()
	{
		return $this->_date;
	}

	public function setId(int $id) {
		$this->_id = $id;
	}

	public function setTitre($titre) {
		if(mb_strlen($titre) >= 3) 
			$this->_titre = $titre;
	}

	public function setContenu($contenu) {
		$this->_contenu = $contenu;
	}

	public function setDate($date) {
		$this->_date = $date;
	}


}