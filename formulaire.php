
<?php 

session_start();


ini_set('display_errors', 1); // Afficher les erreurs à l'écran
ini_set('display_startup_errors', 1); // Même si display_errors est activé, des erreurs peuvent survenir lors de la séquence de démarrage de PHP, et ces erreurs sont cachées. Avec cette option, vous pouvez les afficher, ce qui est recommandé pour le déboguage. En dehors de ce cas, il est fortement recommandé de laisser display_startup_errors à off.
error_reporting(E_ALL); // Afficher les erreurs et les avertissements







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

if (isset($_POST["submit"])) {

	$pseudo = $_SESSION['pseudo'];
	$message = $_POST['message'];


	$insert = $bdd->query("
						
						INSERT INTO messages
							(messageEnvoi, pseudo_identifiants)
						VALUES 
							('$message', '$pseudo')
						");
	// var_dump($insert);

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

 	<form action='#' id='chat' method='post'>
 		<label for="pseudo"> Votre pseudo </label>
 		<br/>
 		<input type="text" name="pseudo" class="text" value="<?php echo $_SESSION['pseudo']; ?>" disabled id="psd">
 		<br/>

 		<label for="message"> Votre message </label>
 		<br/>
 		<input name="message" placeholder="écrire votre message ici..." class='text' id="msg">

 		<br/>

 		<button class="bouton"> Envoyer message </button>
 		<br/>

 	</form>
	
	<!-- div pour l'ajax -->
		<div id="result"> </div>

   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		// Au clic sur le bouton je lance la fonction
	    $("form").submit(function(){

	    	// Stop la propagation par défaut
  			event.preventDefault();	

  			// J'initialise le variable box
    		var box = $('#result');

  			// Je définis ma requête ajax
	       	$.ajax({

		       	type: "POST",

		       	// Adresse à laquelle la requête est envoyée
				url: 'data.php',

				// Le délai maximun en millisecondes de traitement de la demande
	        	timeout: 4000,

				data: {message: $('#msg').val(), pseudo: $('#psd').val()},

		        // La fonction à apeller si la requête abouti
		        success: function (data,status,xhr) {
		            // Je charge les données dans box
		            box.html(data);	 
		            console.log(data);
		            console.log(status);
		            console.log(xhr);
		            
		        },

		        // La fonction à appeler si la requête n'a pas abouti
	        	error: function() {
		            // J'affiche un message d'erreur
		            box.html("Désolé, aucun résultat trouvé.");
	       		 }

		    });

    	});

	});

</script>
 </body>
 </html>