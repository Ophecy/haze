<?php
	require_once 'inc/functions.php';
	logged();
 ?>
	<?php include("header.php"); ?>
<div class="container">
	<h2>Bonjour <?= $_SESSION['auth']->username ?></h2>
	<section>

		<br/>
		<fieldset class = "alert alert-danger">
					<?php
					require 'inc/db.php';
					$id=$_SESSION['auth']->id;
					//debug($_SESSION);
					$req = $pdo->prepare('SELECT * FROM clope WHERE userid=?');
					$req->execute([$id]);
					$user = $req->fetchAll();
					//var_dump($user);
					foreach ($user as $key){
						echo'le '.substr($key->date, 6,2).'/'.substr($key->date,4,2).'/'.substr($key->date, 6,4).' vous avez fumé '.$key->nombre.' cigarettes <br>';
					}

			?></fieldset>
		
	</section>
</div>


</body>
</html>
