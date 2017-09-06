<?php 
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// // Afficher les erreurs et les avertissements
// error_reporting(e_all);


	session_start();

		

	
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


	
	$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	// $pseudo = filter_var($_POST["pseudo"], FILTER_SANITIZE_STRING);

	$login = $bdd->query("

						SELECT pseudo, email, password 
						FROM `identifiants` 
						WHERE email = '$email' AND password = '$password'
					");


while (($loginAll = $login->fetch() )!== false) {

		if ($loginAll["email"] == $email AND $loginAll["password"] == $password) {
		 	$_SESSION['pseudo'] = $loginAll["pseudo"];
			echo "Tu es connecté en tant que " . $loginAll["pseudo"];
			header('Location: formulaire.php');
			
  			
		}else{
			echo "Ce n'est pas le bon pseudo ou mot de passe.";
		}

// echo "<br/>";
// var_dump($_SESSION["email"]);
// var_dump($_SESSION["password"]);


}

}



 ?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
<!--  	<meta http-equiv="refresh" content="10"> -->
 	<link rel="stylesheet" href="style.css">
 	<title>chat conversation</title>
 </head>
 <body>
 	<form method = "post" id='chat' class="login">

 		<h2> Connectez-vous pour recevoir des messages </h2>

 		<label for="email"> Votre email </label>
 		<br/>
 		<input type="email" name="email" class="text">

 		<br/>

 		<label for="password"> Votre mot de passe </label>
 		<br/>
 		<input type="password" name="password" class="text">

 		<br/>

 		<input type="submit" name="submit" value="Se connecter" class="bouton">

 		<br/>

 		<a href="register.php"> Pas encore inscrit ? </a>

 		<br/>

 	</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
 		$("form").submit(function(){
 				// Stop la propagation par défaut
  				event.preventDefault();	
			
				$('.login').load('formulaire.php');
				console.log('ddd');
		});
	});
</script>
 </body>
 </html>