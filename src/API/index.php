<?php
// Initialize the session
session_start();
 
// verifier si l'utilisateur deja connecter
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.Esapce Admin</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">changer le mot de passe</a>
        <a href="logout.php" class="btn btn-danger ml-3">Déconnexion</a>
    </p>
</body>
</html>