<?php

namespace Controller;

use Model\{TicketManager, CommentManager};

class DashboardController {
    
    //appel à la fonction d'affichage des chapitres dans la page db_post du dashboard, condition de connexion
    public function listPosts() {
		if(isset($_SESSION['id'])) {
			$manager = new TicketManager();
			$tickets = $manager->getTickets();
			require '../view/db_post.php';
		} else {
			echo "Vous ne pouvez pas accéder à cette rubrique !";
		}
	}
	
	//appel à la fonction d'affichage des commentaires signalés dans la page db_comment du dashboard
	public function listComments() {
		if(isset($_SESSION['id'])) {
			$manager = new CommentManager();
			$comments = $manager->reportedComments();
			require '../view/db_comment.php';
		} else {
			echo "Vous ne pouvez pas accéder à cette rubrique !";
		}
	}

	//affichage de la page nouveau chapitre du dashboard
	public function newPost() {
		require "../view/db_newPost.php";
	}

	//appel à la fonction d'enregistrement en BDD d'un nouveau chapitre, vérification des champs
	public function storeTicket() {
		$errors = 0;
		$error_messages = [];
		$_SESSION['errors'] = '';
		
		if(empty($_POST['titre']) or mb_strlen($_POST['titre']) <= 2 or mb_strlen($_POST['titre']) > 249) {
			$errors++;
			$_SESSION['errors'] .= 'Le titre n\'a pas un format valide. ';
		}
		if(empty($_POST['contenu']) or mb_strlen($_POST['contenu']) <= 5) {
			$errors++;
			$_SESSION['errors'] .= 'Le contenu du chapitre n\'a pas un format valide.';
		}
		if($errors === 0) {
			$manager = new TicketManager();
			$manager->storeTicket($_POST['titre'], $_POST['contenu']);
			header('location: index.php?action=listPosts');
		} 
		else {
			header('location: index.php?action=listPosts');
			return;
		}
	}

	//appel à la fonction d'affichage de la page du chapitre à modifier dans le dashboard
	public function updatePost() {
		if(isset($_SESSION['id'])) {
			$id = $_GET['ticket_id'] ?? '';
			$manager = new TicketManager();
			$ticket = $manager->getTicket($id);
			require "../view/db_updatePost.php";
		} 
		else {
			echo "Vous ne pouvez pas accéder à cette rubrique !";
		}
	}
	
	// appel à la fonction de modification d'un chapitre en BDD
	public function update() {
		$errors = 0;
		$error_messages = [];
		$_SESSION['errors'] = '';
		
		if(empty($_POST['titre']) or mb_strlen($_POST['titre']) <= 2 or mb_strlen($_POST['titre']) > 249) {
			$errors++;
			$_SESSION['errors'] .= 'Le titre n\'a pas un format valide. ';
		}
		if(empty($_POST['contenu']) or mb_strlen($_POST['contenu']) <= 5) {
			$errors++;
			$_SESSION['errors'] .= 'Le contenu du chapitre n\'a pas un format valide.';
		}
		if($errors === 0) {
			$manager = new TicketManager(); 
			$manager->updateTicket($_POST['id'], $_POST['titre'], $_POST['contenu']);
			header('location: index.php?action=listPosts');
		} 
		else {
			header('location: index.php?action=listPosts');
			return;
		}
	}

	//appel à la fonction d'affichage de la page du chapitre à supprimer dans le dashboard
	public function deletePost() {
		if(isset($_SESSION['id'])) {
			$id = $_GET['ticket_id'] ?? '';
			$manager = new TicketManager();
			$ticket = $manager->getTicket($id);
			require "../view/db_deletePost.php";
		} 
		else {
			echo "Vous ne pouvez pas accéder à cette rubrique !";
		}
	}

	// appel à la fonction de suppression du chapitre en BDD
	public function delete() {		
		if(isset($_SESSION['id'])) {
			$id = $_GET['ticket_id'] ?? '';	
			$manager = new TicketManager(); 
			$manager->deleteTicket($id);
			header('location: index.php?action=listPosts');	
		}
		else {
			header('location: index.php?action=listPosts');
			return;
		}
	}
}


