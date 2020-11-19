<pre>
<?php
// if (session_status() == PHP_SESSION_NONE) session_start();
// if (count($_POST) == 0) die();
$json = json_encode(file_get_contents('php://input'));
include_once("inc/db.php");
$req = $pdo->prepare('INSERT INTO alert SET content=?');
$req->execute([$json]);
?>
</pre>