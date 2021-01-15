<?php
session_start(); 

$action = $_GET['action'] ?? 'index';

require '../vendor/autoload.php'; // instanciation des class

$dotenv = Dotenv\Dotenv::createImmutable("../"); // fichier de configuration
$dotenv->load();

use Controller\{frontController, AuthController, CommentController, DashboardController};

switch($action) {
	
	case 'index':
		$controller = new frontController();
		$controller->index();
	break;
	
	case 'biography':
		$controller = new frontController();
		$controller->biography();
	break;

	case 'book':
		$controller = new frontController();
		$controller->book();
	break;

	case 'connect':
		$controller = new FrontController();
		$controller->connect();
	break;

	case 'connexion':
		$controller = new AuthController();
		$controller->connexion();
	break;

	case 'viewComments':
		$controller = new frontController();
		$controller->viewComment();
	break;

	case 'storeComment':
		$controller = new CommentController();
		$controller->store();
	break;

	case 'storeReported':
		$controller = new CommentController();
		$controller->storeReported();
	break;

	case 'dashboard':
		$controller = new FrontController();
		$controller->dashboard();
	break;

	case 'deconnexion':
		$controller = new AuthController();
		$controller->deconnexion();
	break;

	case 'listPosts':
		$controller = new DashboardController();
		$controller->listPosts();
	break;
	
	case 'listComments':
		$controller = new DashboardController();
		$controller->listComments();
	break;

	case 'unreport':
		$controller = new CommentController();
		$controller->unreport();
	break;

	case 'deleteReport':
		$controller = new CommentController();
		$controller->deleteReport();
	break;

	case 'newPost':
		$controller = new DashboardController();
		$controller->newPost();
	break;

	case 'storeTicket':
		$controller = new DashboardController();
		$controller->storeTicket();
	break;
	
	case 'updatePost':
		$controller = new DashboardController();
		$controller->updatePost();
	break;

	case 'update':
	$controller = new DashboardController();
	$controller->update();
	break;

	case 'deletePost':
	$controller = new DashboardController();
	$controller->deletePost();
	break;

	case 'delete':
	$controller = new DashboardController();
	$controller->delete();
	break;

	default:
		echo '404';
	break;

}