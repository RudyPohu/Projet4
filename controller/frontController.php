<?php

namespace Controller;

use Model\{TicketManager, CommentManager};

class frontController {

	public function index()	{
		require "../view/blog_home.php";
	}

	public function biography()	{
		require "../view/blog_biography.php";
	}

	// appel à la fonction d'affichage des chapitres, redirection
	public function book() {

		$manager = new TicketManager();
		$tickets = $manager->getTickets();
		require '../view/blog_book.php';
	}

	// recupération de l'id du chapitre, appel à la fonction d'affichage du chapitre sélectionné et des commentaires associés, redirection
	public function viewComment() {
		$id = $_GET['ticket_id'] ?? '';
		if($id == '') {
			header('location: index.php');
			return;
		}
		$managerTickets = new TicketManager();
		$ticket = $managerTickets->getTicket($id);
		$managerComments = new CommentManager();
		$comments = $managerComments->getComments($id);
		require '../view/blog_comments.php';	
	}

	public function connect()
	{
		require "../view/blog_connexion.php";
	}

	// redirection vers le tableau de bord si la session est active
	public function dashboard()
	{
		if(isset($_SESSION['id']))
		{
			require "../view/dashboard.php";
		} else {
			header('location: index.php');
			return;
		}
	}

}