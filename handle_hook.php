<pre>
<?php
$json = file_get_contents('php://input');
if (strlen($json) < 10) die();

include_once("inc/db.php");
$req = $pdo->prepare('INSERT INTO alert SET content=?, timestamp=?');
$req->execute([$json, time()]);
?>
</pre>