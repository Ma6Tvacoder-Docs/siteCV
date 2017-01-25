<?php

// pisola 29 janvier traitement du formulaire d'inscription depuis la page linscription.php
	if (isset($_POST['nom'])){//a-t-on reçu le formulaire ?
	
		$nom=addslashes($_POST['nom']);
		$prenom=addslashes($_POST['prenom']);
		$courriel=addslashes($_POST['courriel']);
		$motdepasse=addslashes($_POST['motdepasse']);
		$tel=addslashes($_POST['tel']);
		$adresse=addslashes($_POST['adresse']);
		$code_postal=addslashes($_POST['code_postal']);
		$ville=addslashes($_POST['ville']);
		$pays=addslashes($_POST['pays']);
		$portable=addslashes($_POST['portable']);
		
		
		$sql = $pdoJR->query("SELECT * FROM t_paysCB WHERE paysCBFR='$pays' "); //on cherche le code de la zone pays d'apère le pays indiqué par le client
		
		$ligne = $sql->fetch();
		$zone_geo = $ligne['zone_pays'];
		
		//vérifier qu'il n'est pas déjà inscrit 
		
		$sql = $pdoJR->prepare("SELECT * FROM t_client WHERE courriel='$courriel'  "); //on cherche dans la base ce courriel si oui il est déjà inscrit sinon INSERT t_client 
		$sql->execute(); 
		$nbr_client = $sql->rowCount(); // on compte et s'il y est il répond 1 sinon il répond 0

		if($nbr_client==0){//pas déjà inscrit on ne l'a pas trouvé
		
			//header("location: linscription_deja.php");
//			exit();
		$pdoJR->exec(" INSERT INTO t_client VALUES (NULL, '$nom', '$prenom', '$courriel' , '$motdepasse', '$tel', '$adresse', '$code_postal', '$ville', '$pays', '$zone_geo', '$portable', '$datedujour' ) ");
		// on l'insert dans la table client
		//envoi de l'email au client et à vincent et à christophe
		
		$entete ="From: Site AutoJauneJunior <contact@autojaunejunior.com>\r\n"; 
		$entete.="Reply-To: contact@autojaunejunior.com\r\n";
		$entete.="MIME-version: 1.0\r\n";
		$entete.="Content-Type: text/html; charset=\"UTF-8\""."\n"; //utf 8 pour avoir les accents
		$entete.="Content-Transfer-Encoding: 8bit";
		
		$corps='Nouvelle inscription AutoJaune Jr. : '.$prenom.'  '.$nom.' vient de s\'inscrire.  ';
		$corps.="<br>Nom : ".$nom.'<br> ' ;
		$corps.="Prenom : ".$prenom.'<br>' ;
		$corps.="Courriel : ".$courriel.'<br>';
		$corps.="Tel. : ".$tel.'<br>';
		$corps.="Adresse : ".$adresse.' ';
		$corps.="Code postal : ".$code_postal.' ';
		$corps.="Ville : ".$ville.'<br>';
		$corps.="Pays : ".$pays.'<br>';
		$corps.="Pour la livraison : zone ".$zone_geo.'<br>';
		$corps.="Portable : ".$portable.'<br><br>';
		$corps.="Son mot de passe : ".$motdepasse.'<br>';
		
		//$corps.=" \nmessage : ".$_POST['message'];
		//$nouvelinscrit.=' Prenom : '.$prenom.' '.$nom.''; //début du courriel
		
		mail('webmestre@autojaunejunior.com,contact@autojaunejunior.com','Inscription de : '.$nom, $corps, $entete);//on fait un courriel pour Christophe avec le nom du client dans l'objet
		
		$corps_pourleclient='Bonjour et bienvenue '.$prenom.'  '.$nom.'<br> Merci de votre inscription sur le site de l\'AutoJaune Jr.<br>';
		$corps_pourleclient.='Voici vos informations que vous pourrez mettre a jour sur le site en vous identifiant : <br> ';
		$corps_pourleclient.='<strong>'.$prenom.' ' ;
		$corps_pourleclient.=' '.$nom.'</strong><br>';
		$corps_pourleclient.='Courriel : '.$courriel.'<br>';
		$corps_pourleclient.='Tel. : '.$tel.'<br>';
		$corps_pourleclient.='Adresse : '.$adresse.'<br>';
		$corps_pourleclient.='Code postal : '.$code_postal.'<br>';
		$corps_pourleclient.='Ville : '.$ville.'<br>';
		$corps_pourleclient.='Pays : '.$pays.'<br><br>';
		$corps_pourleclient.='Portable : '.$portable.'<br><br>';
		$corps_pourleclient.='Pour vous identifier sur le site : <br>votre courriel : <strong>'.$courriel.'</strong><br>';
		$corps_pourleclient.='et votre mot de passe : <strong>vous seul le connaissez !</strong><br><br><br>';
		$corps_pourleclient.='Rendez-vous sur la page de <a href=\"http://www.autojaunejunior.com/fr/le_compte.php\">connexion</a> pour vous connecter et commencer vos achats.<br><br>';
		$corps_pourleclient.='***************<br><br>';
		$corps_pourleclient.='<a href=\"http://www.autojaunejunior.com/index.php\">www.autojaunejunior.com</a><br><br>';
		$corps_pourleclient.='<a href=\"mailto:contact@autojaunejunior.com\">contact@autojaunejunior.com</a><br>';
		
		mail($courriel,'Votre inscription AutoJaune Jr. ', $corps_pourleclient, $entete);//on fait un courriel pour le client
		
		header("location: linscription_confirmation.php");
			exit();
	}else {// il est déjà inscrit fin du if
		header("location: linscription_deja_inscrit.php");
		}
	}
	?>