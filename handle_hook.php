<pre>
<?php
// if (count($_POST) == 0) die();
$json = json_encode($_REQUEST);
include_once("inc/db.php");
$req = $pdo->prepare('INSERT INTO alert SET content=?');
$req->execute([$json]);
var_dump($json);

?>
</pre>