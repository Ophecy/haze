<pre>
<?php
$post = json_encode($_POST);
include_once("inc/db.php");
$req = $pdo->prepare('INSERT INTO alert SET content=?');

$req->execute([$post]);

?>
</pre>