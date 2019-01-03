
<?php

//Toutes les fonctions nécessaires

function debug($variable)
{
	echo "<pre> ". print_r($variable, true)."</pre>";
}

function str_random($length)
{
	$alphanum="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	return substr(str_shuffle(str_repeat($alphanum, $length)),0,$length); //36min
}

/*function if_logged()
{
	if(session_status()==PHP_SESSION_NONE)
	{
	session_start();
	}
	if (!isset($_SESSION['authentif']))
	{
		$_SESSION['alert_message']['danger'] ="Vous ne pouvez pas accéder à cette page.";
		header('Location: connexion.php');
		exit();
	}
}*/

/*function auto_reconnect()
{
	if(session_status()==PHP_SESSION_NONE)
	{
	session_start();
	}

	if(isset($_COOKIE['autolog'])&& !isset($_SESSION['authentif']) )
	{
		include('database.php');
		$autolog_token=$_COOKIE['autolog'];
		$parts=explode('//',$autolog_token);//Sépare id utilisateur et le cookie avec des "//"
		$user_id = $parts[0];
		if(!isset($bdd)){
		global $bdd;	
		}
		
		$req=$bdd->prepare('SELECT* FROM membres WHERE id = ?');
		$req->execute([$user_id]);
		$user=req->fetch();
		if ($user) 
		{
			$expected_token=$user_id.'//'.$user->$autolog_token);
			if($expected_token==$autolog)
			{
				session_start();
				$_SESSION['authentif'] = $pseudo;
				setcookie('autolog',$autolog_token,time()+60*60*24*15);)
				
			}else {
			setcookie('autolog',NULL,-1);

		}else {
			setcookie('autolog',NULL,-1);
		}

	}
}*/	


//NB si besoin de permettre à l'utilisateur de modifier son compte -> récupération depuis la session : 1h06