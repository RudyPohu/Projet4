<?php

namespace Controller;

use Model\CommentManager;

class CommentController {

	// vérification des champs du formulaire d'envoi de commentaire, appel à la fonction permettant d'enregistrer le commentaire en BDD, redirection 
	public function store()
	{
		$errors = 0;
		$error_messages = [];
		$_SESSION['errors'] = '';
		
		if(empty($_POST['auteur']) or mb_strlen($_POST['auteur']) <= 2 or mb_strlen($_POST['auteur']) > 249) {
			$errors++;
			$_SESSION['errors'] .= 'L\'auteur n\'a pas un format valide. ';
		}
		if(empty($_POST['commentaire']) or mb_strlen($_POST['commentaire']) <= 5) {
			$errors++;
			$_SESSION['errors'] .= 'Le commentaire n\'a pas un format valide.';
		}
		if(empty($_POST['id_ticket']) or !is_numeric($_POST['id_ticket'])) {
			$errors++;
			$_SESSION['errors'] .= 'erreur d\'id';
		}

		if($errors === 0) {
			$manager = new CommentManager();
			$manager->store($_POST['id_ticket'], $_POST['auteur'], $_POST['commentaire']);
			header('location: index.php?action=viewComments&ticket_id='.$_POST['id_ticket']);
		} 
		else {
			header('location: index.php?action=viewComments&ticket_id='.$_POST['id_ticket']);
			return;
		}
	}

	// appel à la fonction permettant de signaler un commentaire
	public function storeReported()	{
		$manager = new CommentManager();
		$manager->report($_POST['id']);
		header('location: index.php?action=viewComments&ticket_id='.$_POST['id_ticket']);
		return;
	}

	// admin // appel à la fonction permettant de valider un commentaire
	public function unreport() {
		$manager = new CommentManager();
		$manager->unreport($_GET['id']);
		header('location: index.php?action=listComments');
		return;
	}

	// admin // appel à la fonction permettant de supprimer un commentaire
	public function deleteReport() {
		$manager = new CommentManager();
		$manager->deleteReport($_GET['id']);
		header('location: index.php?action=listComments');
		return;
	}
}

