<?php include_once ('database.php'); ?>
<?php include_once ('functions.php'); ?>

<?php
if (!empty($_POST))// if all the fields are filled
{
	$errors=array();//array for all potential errors
	if (empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo']))
	{
		$errors['pseudo'] ="Votre pseudo n'est pas valide";
	}	else {
		$req=$bdd->prepare('SELECT id from users WHERE pseudo= ?');
		$req->execute([$_POST['pseudo']]);
		$pseudo=$req->fetch();
		if ($pseudo)
		{
			$errors['pseudo']= 'Ce pseudo est déjà utilisé.';
		}
	}

	if (empty($_POST['email']) || !preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email']))
		{
			$errors['email'] ="Votre adresse email n'est pas valide";
		}else { 
		$req=$bdd->prepare('SELECT id from users WHERE email= ?');
		$req->execute([$_POST['email']]);
		$pseudo=$req->fetch();
		if ($pseudo)
		{
			$errors['email']= 'Cette adresse mail est déjà utilisée pour un autre compte.';
		}
	}
		
	if (empty($_POST['pass']) || $_POST['pass']!=$_POST['confirm'])
	{
		$errors['pass'] ="Assurez vous d'avoir saisi deux fois le même mot de passe";
	}
	if (empty($errors))
	{
	
	$req = $bdd->prepare("INSERT INTO users(pseudo, pass, email) VALUES(?, ?, ?)");
	$pass_hache=password_hash($_POST['pass'],PASSWORD_BCRYPT);
	$req->execute([$_POST['pseudo'], $pass_hache,$_POST['email']]);
	header('Location: confirmation.php');
	exit();	
	//die("Votre compte a bien été créé.");
	}
	debug($errors);
}	

?>

<h1>Formulaire d'inscription</h1>

<?php include ('menu.php') ?>
<!--S'il y a des erreurs, affichage-->

<?php if (!empty($errors)): ?>

<div class="alert alert-danger">

	<p> Le formulaire n'est pas rempli correctement</p>
	<ul>
		<?php //Récupération de chaque erreur + lister
		 foreach ($errors AS $error): ?>

			<li> <?php $error; ?> </li>

		<?php endforeach; ?>
	</ul>	

</div>

<?php endif; ?>


<form method="POST" action="">

	<label>Pseudo : <input type="text" name="pseudo" id="pseudo" placeholder="Giant_Coucou" /></label> <br/>

	<label>Adresse mail : <input type="text" name="email" id="email" placeholder="" /></label> <br/>

	<label>Mot de passe : <input type="password" name="pass" id="pass" placeholder="Nouveau mot de passe"  /></label> <br/>

	<label>Confirmez votre mot de passe : <input type="password" name="confirm" id="passConfirm" placeholder="Veuillez confirmer votre mot de passe" /></label> <br/>

	<button type="submit">Je m'inscris !</button>

<?php include ('footer.php'); ?>