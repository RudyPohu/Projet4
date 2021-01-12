<?php

namespace Controller;

use Model\AuthManager;

class AuthController {
    
    // verification des éléments de connexion au dashboard, appel à la fonction getUser permettant de récupérer les éléments en BDD, comparaison des éléments, redirection
    public function connexion()	{
		$errors = 0;
		$error_messages = [];
		$_SESSION['errors'] = '';

		if(empty($_POST['pseudo']) or mb_strlen($_POST['pseudo']) <= 2 or mb_strlen($_POST['pseudo']) > 249) {
			$errors++;
			$_SESSION['errors'] .= 'Le pseudo n\'a pas un format valide. ';
		}

		if(empty($_POST['pass']) or mb_strlen($_POST['pass']) <= 5) {
			$errors++;
			$_SESSION['errors'] .= 'Le mot de passe n\'a pas un format valide.';
		}

		if($errors === 0) 
		{	
			$manager = new AuthManager();
			$user = $manager->getUser($_POST['pseudo']);
			if($user and password_verify($_POST['pass'], $user->pass())) {
				$_SESSION['id'] = $user->id();
				$_SESSION['pseudo'] = $user->pseudo();
				header('location:index.php?action=dashboard');
				return;
			} 
			else {
				$_SESSION['errors'] = 'Login ou mot de passe incorrect';
			}
		}
		header('location:index.php?action=connect');
		return;
	}

	// arret de la session lors de la demande de deconnection depuis le dashboard, redirection
	public function deconnexion() {
		if(isset($_SESSION['id'])) {
			unset($_SESSION);
			session_destroy();
			header('location:index.php');
			return;
		}
	}
}


