<?php 
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// // Afficher les erreurs et les avertissements
// error_reporting(e_all);



try
{
	$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'user');
	// echo "la connexion avec la bdd fonctionne";

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
        // echo 'la connexion  avec la bdd ne fonctionne PAS !!';
}




// $pseudo = $bdd->query("

// 						SELECT pseudo
// 						FROM identifiants						
// 					");

$message = $bdd->query("

						SELECT messageEnvoi, pseudo_identifiants
						FROM messages
					");



// while (($pseudoAll = $pseudo->fetch() )!== false) {

// 	echo "<br/>" . "<strong>" . $pseudoAll["pseudo"] . "</strong>" . "<br/>";

// }
echo 
"<div class='chat'>
  <div class='messages'>
    <div class='message'>"
      
  ;


while (($messageAll = $message->fetch() )!== false) {

	echo 
	"<div class='bot'>" .

	"<br/>" . "<strong>" . $messageAll["pseudo_identifiants"] . "</strong>" . "<br/>" . $messageAll["messageEnvoi"] . "<br/>"

	 . "</div>"
    

	;

}

echo " </div>
    </div>";


	
// echo "<strong>" . $pseudo . " <strong> <br/>" . $message;  




 ?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
<!--  	<meta http-equiv="refresh" content="1"> -->
 	<link rel="stylesheet" href="style.css">
 	<title>chat conversation</title>
 </head>
 <body>



 </body>
 </html>