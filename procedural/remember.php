<?php 
include ('functions.php');
include ('menu.php');

?>

<?php if(!empty('$_POST') && !empty($_POST['email']))
{
	include ('database.php');
	$req=$bdd->prepare('SELECT* FROM membres WHERE email = ? AND confirmation_date IS NOT NULL');//58mi40 sec Délirant ?
	$req->execute(array(
	'email'=>$_POST['email']
	));
	$user=$req->fetch();
	
	if($pseudo);//Débug du mot de passe tapé
		{
			session_start();
			$reset_token=str_random(60);
			$bdd->prepare('UPDATE membres SET reset_token = ?, reset_date = now() WHERE id= ?')->execute([$reset_token,$user_id]);
			$_SESSION['alert_message']['success'] ="Pour réinitialiser votre mot de passe, veuillez suivre les instructions contenues dans le mail qui vient de vous être envoyé par email.";
			mail($_POST['email'],'Réinitialisation de votre mot de passe',"Afin de réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous\n\n http://localhost/tests/forteroche/reset.php?id={$user_id}&token=$reset_token"); // 1h18min50 
			header('Location : connexion.php');
			exit();
		} else {
			$_SESSION['alert_message']['danger'] ="Aucun compte ne correspond à cette adresse mail.";
	}
}
?>

<?php

debug($_SESSION);

//49 minutes

?>


<!DOCTYPE html>
<html>
<head>
	<title>Se connecter</title>
</head>
<body>

<h1>J'ai oublié mot de passe</h1>

<form method="POST" action=" ">

	<label>Votre adresse mail : <input type="email" name="email" id="email" placeholder="" required /></label> <br/>

		
	<input type="submit" value="Se connecter" /> <br/>

	<input type="checkbox" name="connexion automatique" id="connectAuto" placeholder="" /><label>Connexion automatique </label> <br/>
</form>

</body>
</html>