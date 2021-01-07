<?php

namespace Model;

// use Model\{frontController,TicketManager};

class User 
{
	private $_id;
	private $_pseudo;
	private $_pass;

	public function __construct(array $datas) 
	{
		foreach($datas as $key =>$data) 
		{
			$method = 'set'.ucfirst($key);	
			$this->$method($data); 
		}
	
	}


	public function id()
	{
		return $this->_id;
	}

	public function pseudo()
	{
		return $this->_pseudo;
	}

	public function pass()
	{
		return $this->_pass;
	}

	public function setId(int $id) {
		$this->_id = $id;
	}

	public function setPseudo($pseudo) {
			$this->_pseudo = $pseudo;
	}

	public function setPass($pass) {
		$this->_pass = $pass;
	}

}