<?php 
if(!isset($_SESSION)){session_start();}
unset($_SESSION['auth']);
session_destroy();
session_start();
$_SESSION['flash']['success'] = "Vous etes deconnecté";
header('Location: login.php');
?>