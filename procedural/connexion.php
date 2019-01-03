<?php

include ('functions.php');
auto_reconnect();

if(isset(['authentif']))
{
	header('Location: account.php');
	exit();
}

if(!empty('$_POST') && !empty($_POST['pseudo'])&& !empty($_POST['pass']))
{
	include ('database.php');
	$req=$bdd->prepare('SELECT* FROM membres WHERE pseudo = :pseudo OR email =:pseudo AND confirmation_date IS NOT NULL');//58mi40 sec Délirant ?
	$req->execute(array(
	'pseudo'=>$_POST['pseudo']
	));
	$user=$req->fetch();
	
	if(password_verify($_POST['pass'],$_user->$pass_hache));//Débug du mot de passe tapé
		{
			$_SESSION['authentif'] = $pseudo;
			$_SESSION['alert_message']['success'] ="Vous êtes connecté !";
			if($_POST['auto_login'])
			{
				$autolog_token=str_random(250);
				$bdd-->prepare('UPDATE membres SET autolog_token=? WHERE id=?'->execute([$autolog_token, $user->id]));
				setcookie('autolog',$user->id.'//'.$autolog_token,time()*60*60*24*15);//Durée du cookie= 15 jours
			}
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

<h1>Se connecter</h1>

<form method="POST" action=" ">

	<label>Pseudo ou votre adresse mail : <input type="text" name="pseudo" id="pseudo" placeholder="" required /></label> <br/>
	<label>Mot de passe : <a href="forget.php"> Mot de passe oublié ? </a> <input type="password" name="pass" id="pass" placeholder="" required /></label> <br/>
	
	<input type="submit" value="Se connecter" /> <br/>
	<div class="form-group">
	<input type="checkbox" name="auto_login" id="connectAuto" value="1" /><label>Connexion automatique </label> <br/>
	</div>
</form>

</body>
</html>