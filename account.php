<?php
require_once 'inc/functions.php';
logged();
?>
<?php include("header.php"); ?>
<div class="container">
	<h2>Bonjour <?= $_SESSION['auth']->username ?></h2>
	<section>

		<br />
		<fieldset class="alert alert-danger">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</fieldset>

	</section>
</div>


</body>

</html>