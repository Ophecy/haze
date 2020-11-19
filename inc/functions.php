<?php
function debug($variable)
{
	echo '<pre>' . print_r($variable, true) . '</pre>';
}

function token()
{
	return substr(str_shuffle(str_repeat("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN", 60)), 0, 60);
}

function logged()
{
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	//var_dump($_SESSION['auth']);
	if (!isset($_SESSION['auth'])) {
		$_SESSION['flash']['danger'] = "Veuillez d'abord vous connecter";
		header('Location: login.php');
		exit();
	}
}

function save()
{
	require_once 'inc/db.php';
	if (isset($_SESSION['auth'])) {
		$id = $_SESSION['auth']->id;
		$req = "SELECT lastco FROM users WHERE id=$id";
		$lastco = $pdo->query($req);
		$lastco = $lastco->fetch();
		$lastco = $lastco->lastco;
		$date = date('Ymd');

		if ($lastco != $date) {
			$_SESSION['flash']['success'] = 'Votre suivi a été sauvé';

			$req = $pdo->prepare("UPDATE users SET lastco=? WHERE id=?");	//on prepare l'update de la bdd
			$req->execute([$date, $id]);   //on met lastco à la date du jour
		}
	}
}
