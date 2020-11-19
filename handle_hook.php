<pre>
<?php
// if (count($_POST) == 0) die();
$post = json_encode($_POST);
include_once("inc/db.php");
$req = $pdo->prepare('INSERT INTO alert SET content=?');
$req->execute([$post]);

var_dump($post);

?>
</pre>