<?php

echo "Votre compte est désormais opérationnel.";
session_start();
//header('Location: https://www.lequipe.fr');
/*
$_SESSION['alert_message']['success'] = "Votre compte est désormais opérationnel.";*/
/*if ($user && $user->confirmation_token==$token)
{
	//Pour que l'utilisateur n'est plus accès à confirmation.php
	session_start();
	$bdd->prepare('UPDATE users SET confirmation_token=NULL,confirmation_date=now() WHERE id=?')->execute([$user_id]);//Jusqu'à 46min
	$_SESSION['alert_message']['success'] = "Votre compte est désormais opérationnel.";
	$_SESSION['authentif']=$user;


	header('Location: account.php');

	echo 'Le compte a bien été créé !';
} else {
	$_SESSION['alert_message']['danger'] ="Cette clé n'est plus valide !";
	header('Location : login.php');
	echo "Le compte n'a pas été créé..."; 
}*/



?>