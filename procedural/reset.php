<?php 

if(isset($_GET['id']) && isset($_GET['token']))
{
	include ('database.php');
	include ('functions.php');
	$req=$bdd->prepare('SELECT* FROM membres WHERE id = ? AND reset_token IS NOT NULL AND reset_token= ? and reset_date> DATE_SUB(NOW(),INTERVAL 30 MINUTE)');
	$req->execute([$_GET['id'],$_GET['token']]);
	$user=$req->fetch();
	if($user) {
		if (!empty($_POST)){
			if (!empty($_POST['pass']) && $_POST['pass'] == $_POST['pass_confirm']){
				$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
				$bdd->prepare('UPDATE membres SET pass=?,reset_date=NULL,reset_token=NULL')->execute([$password]);
				session_start();
				$_SESSION['authentif']->$user;
				$_SESSION['alert_message']['success'] ="Votre mot de passe a bien été réinitialisé !";
				header('Location : account.php');
				exit();
		}
}else {
	session_start();
	$_SESSION['alert_message']['danger'] ="La clé utilisée n'est pas valide.";
	header('Location : connexion.php');
	exit();
}
else {
	header('Location : connexion.php');
	exit();

}	

?>
<?php 
include ('functions.php');
include ('menu.php');

?>

<?php if(!empty('$_POST') && !empty($_POST['pseudo'])&& !empty($_POST['pass']))
{
	include ('database.php');
	$req=$bdd->prepare('SELECT* FROM membres WHERE pseudo = :pseudo OR email =:pseudo AND confirmation_date IS NOT NULL');//58mi40 sec Délirant ?
	$req->execute(array(
	'pseudo'=>$_POST['pseudo'];
	));
	$user=$req->fetch();
	
	if(password_verify($_POST['pass'],$_user->$pass_hache));<!--Débug du mot de passe tapé-->
		{
			session_start();
			$_SESSION['authentif'] = $pseudo;
			$_SESSION['alert_message']['success'] ="Vous êtes connecté !";
			header('Location : account.php');
			exit();
		} else {
			$_SESSION['alert_message']['danger'] ="Pseudo ou mot de passe incorrect !";
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

<h1>Réinitialiser mon mot de passe</h1>

<form method="POST" action=" ">

	<label>Mot de passe : <input type="password" name="pass" id="password" placeholder="" required /></label> <br/>
	<label>Confirmez votre mot de passe :  <input type="password" name="pass_confirm" id="pass_confirm" placeholder="" required /></label> <br/>
	
	<input type="submit" value="Réinitialiser mon mot de passe" /> <br/>

	<input type="checkbox" name="connexion automatique" id="connectAuto" placeholder="" /><label>Connexion automatique </label> <br/>
</form>

</body>
</html>