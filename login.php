<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require 'inc/db.php';
require 'inc/functions.php';
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {



	$req = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :username');
	$req->execute(['username' => $_POST['username']]);
	$user = $req->fetch();
	if ($user!=false){
		var_dump($user);
		if(password_verify($_POST['password'], $user->password)){
			if (!isset($_SESSION)){session_start();}
			$_SESSION['auth'] = $user;
			$_SESSION['flash'] ['success'] = "Vous etes maintenant connecté";
			header('Location: index.php');
		}
	}else {
		$_SESSION['flash']['success'] = "Cet utilisateur n'existe pas";
	}
}
?>

  <?php include("header.php");?>

<center>
<h2>login</h2>
	<div class="container">
		<form action="" method="post">
			<div>
				<input type="text" name="username" placeholder="Utilisateur ou email" autofocus><br>
			</div>
			<div class="interligne">
			</div>
			<br>
			<div>
				<input type="password" name="password" placeholder="Mot de passe"  ><br>
			</div>
<br>
			<button type="submit" class="btn btn-primary">Se connecter</button>

		</form>
	</div>
</center>
</body>
</html>
