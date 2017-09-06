<?php 
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// // Afficher les erreurs et les avertissements
// error_reporting(e_all);




if (isset($_POST["submit"])) {
	$logout =  session_destroy();
}


 ?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
 	<!-- <meta http-equiv="refresh" content="10"> -->
 	<link rel="stylesheet" href="style.css">
 	<title>chat conversation</title>
 </head>
 <body>
 	<form id='chat' method="post" class="logout">
 		<input type="submit" name= "logout" value="Se déconnecter"> 
 	</form>
 </body>
 </html>