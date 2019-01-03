<?php //session_start() 
//include ('functions.php');
include ('database.php');
include ('menu.php');

//S'assurer que l'utilisateur est bien connecté
	session_start();
	$_SESSION['authentif']=$user;
	header('Location: account.php')
}

?>

<?php

//debug($_SESSION);


?>

<h1>Bonjour <?php $_SESSION['authentif']->pseudo; ?></h1>
<!--Explication à 1h06m50sec-->

<form action="" method='POST'>

	<div class="form-group">
		<input class="form-control" type="password" name="pass" placeholder="Changer de mot de passe">
	</div>	

	<div class="form-group">
		<input class="form-control" type="password" name="pass_confirm" placeholder="Confirmer votre nouveau mot de passe">
	</div>	

	<button class="btn- btn-primary">	Réinitilaiser le mot de passe </button>
	

</form>	

<?php include ('menu.php');?>