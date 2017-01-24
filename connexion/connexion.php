<?php
	
	$hote='localhost'; // le chemin vers le serveur
	$bdd='sitecv'; // nom de la base
	$utilisateur='root'; // nom d'utilisateur pour se connecter
	$passe=''; // mot de passe de l'utilisateur pour se connecter
//    $passe='root'; // A ACTIVER SUR LE MAC


	$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
	//$pdoJR est le nom de variable de la connexion il sert partout où l'on doit se servir de cette
	//connexion PDO c'est un objet et il a des fonctions
	$pdoCV->exec("SET NAMES utf8");
	
?>