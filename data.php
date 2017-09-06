<?php


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



	$pseudo = $_POST['pseudo'];
	$message = $_POST['message'];


	$insert = $bdd->query("
						
						INSERT INTO messages
							(messageEnvoi, pseudo_identifiants)
						VALUES 
							('$message', '$pseudo')
						");
	// var_dump($insert);

$message = $bdd->query("

						SELECT messageEnvoi, pseudo_identifiants
						FROM messages
					");




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


	

echo "<strong>" . $_POST['pseudo'] . "</strong>";
echo "<br/>";
echo $_POST['message'];

?>