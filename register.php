<?php
require_once 'inc/functions.php'
?>

<?php

if (!empty($_POST)) {
	$errors = array();
	require_once 'inc/db.php';

	if (empty($_POST['username']) || !preg_match(('/^[a-zA-Z0-9_]+$/'), $_POST['username'])) {
		$errors['username'] = "Vous n'avez pas entré de pseudo";
	} else {
		$req = $pdo->prepare('SELECT id FROM users WHERE username=?');
		$req->execute([$_POST['username']]);
		$user = $req->fetch();
		if ($user) {
			$errors['username'] = 'ce pseudo est deja pris';
		}
	}

	if (!preg_match(('/^[a-zA-Z0-9_]+$/'), $_POST['username'])) {
		$errors['username'] = "votre pseudo est invalide";
	}

	if (empty($_POST['email'])) {
		$errors['email'] = "Vous n'avez pas entré d'email";
	} else {
		$req = $pdo->prepare('SELECT id FROM users WHERE email=?');
		$req->execute([$_POST['email']]);
		$user = $req->fetch();
		if ($user) {
			$errors['email'] = 'cet email est deja enregistré';
		}
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Votre email est invalide";
	}

	if (empty($_POST['password'])) {
		$errors['password'] = "Vous n'avez pas entré de mot de passe";
	}

	if ($_POST['conf'] != $_POST['password']) {
		$errors['confirmation'] = "vos mots de passe ne correspondent pas";
	}

	if (empty($_POST['nom'])) {
		$errors['nom'] = "Vous n'avez pas entré votre nom";
	}

	if (empty($_POST['prenom'])) {
		$errors['prenom'] = "Vous n'avez pas entré votre prenom";
	}

	if (empty($_POST['age'])) {
		$errors['age'] = "Vous n'avez pas entré votre age";
	}

	if (empty($errors)) {
		$req = $pdo->prepare('INSERT INTO users SET username=?, password=?,email=?,nom=?,prenom=?,age=?,sexe=?');

		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$req->execute([$_POST['username'], $password, $_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['sexe']]);
		$_SESSION['flash']['success'] = "Votre compte a été créé";
	}
}


?>


<!DOCTYPE html>
<?php include("header.php"); ?>


<?php if (!empty($errors)) : ?>

	<?php $_SESSION['flash']['error'] = "Vous n'avez pas rempli le formulaire correctement"; ?>
	<ul>
		<?php foreach ($errors as $error) : ?>
			<li><?= $error; ?></li>
		<?php endforeach; ?>
	</ul>
	</div>

<?php endif; ?>
<center>
	<div class="container">
		<form action="" method="post" class="form-group">
			<br>
			<div class="center">
				<input type="text" name="nom" title="nom" placeholder="Nom" required><br>
			</div>
			<br>
			<div class="center">
				<input type="text" name="prenom" title="prenom" placeholder="Prenom" required><br>
			</div>
			<br>
			<div class="center">
				<input type="number" name="age" title="age" placeholder="Age" required<br>
			</div>
			<br>
			<div class="center">
				<select name="sexe" size="1">
					<option value="" disabled selected>Sexe</option>
					<option value="h">Homme</option>
					<option value="f">Femme</option>
				</select>
			</div>
			<br>
			<div class="center">
				<input type="text" name="username" placeholder="Nom d'utilisateur"><br><br>
			</div>

			<div class="center">
				<input type="Email" name="email" placeholder="Email"><br><br>
			</div class="center">

			<div class="center">
				<input type="password" name="password" placeholder="Mot de passe"><br><br>
			</div class="center">

			<div class="center">
				<input type="password" name="conf" placeholder="Confirmation"><br><br>
			</div>

			<button type="submit">Envoyer vos informations</button>
		</form>
	</div>
</center>
</body>

</html>