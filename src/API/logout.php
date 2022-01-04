<?php
// Initialize the session
session_start();
 
// detruire les variables session 
$_SESSION = array();
 
//  detruire les sessions .
session_destroy();
 
// redirection vers la page login.php
header("location: login.php");
exit;
?>