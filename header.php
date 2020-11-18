<?php if (!isset($_SESSION)){session_start();}  ?>
<!DOCTYPE html>
<html lang="fr">
<!-- HEAD -->
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/PNG" href="images/logo.PNG" />
	<link href="https://fonts.googleapis.com/css?family=Dosis|Lobster|Montserrat|Oxygen|Raleway" rel="stylesheet">
	<!-- Add Proxima Libre (external foundry) -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="styles.css" />
	<title>SantéEpsi.com</title>
</head>

<!-- BODY -->
<body>
<header id="mainHeader">
<a href="index.php" class='head'>
	<div class="element">
		<h1><img id="logo" src="images/logo.PNG" alt="Logo">Haze<span class="lightText">.com</span></h1>
	</div>
</a>
	<nav id="menuSecondaire"> <!-- Remplacer éléments par des buttons -->
		<?php if (!isset($_SESSION['auth'])):  ?>
			<a class='head' href="login.php"><div class="element">Se connecter</div></a>
			<div class="line-separator"></div>
			<a class='head' href="register.php"><div class="element">S'inscrire</div></a>
		<?php else: ?>
			<a href="account.php" class='head'><div class="element">Mon compte</div></a>
			<a href="logout.php" class='head'><div class="element">Se deconnecter</div></a>
		<?php endif; ?>
	</nav>
</header>

<?php
if (isset($_SESSION['flash'])){
	foreach ($_SESSION['flash'] as $type => $message){
		echo "<div >".$message."</div>";
	}
	unset($_SESSION['flash']);
}
include_once 'inc/functions.php';
//debug($_SESSION);
//debug($_POST);
save();
?>


