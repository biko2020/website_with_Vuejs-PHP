<?php
// Initialiser la session
session_start();
 
// detruire les variables session 
$_SESSION = array();
 
//  detruire la session .
session_destroy();
 
// redirection vers la page login.php
header("location: login.php");
exit;
?>