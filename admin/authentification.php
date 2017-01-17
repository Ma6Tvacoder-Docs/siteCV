<?php require '../connexion/connexion.php' ?>
<?php
	
session_start();// à mettre dans toutes les pages SESSION et identification

if(isset($_POST['connexion'])){// on envoie le formulaire avec le name du bouton, connexion on a cliqué sur le bouton
	$email=addslashes($_POST['email']);
	$mdp=addslashes($_POST['mdp']);
	
		$sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE email='$email' AND mdp='$mdp'  "); //on vérifie le courriel et le mot de passe et … 
		$sql->execute(); 
		$nbr_utilisateur= $sql->rowCount(); // … on compte, et s'il y est, le compte répond 1 sinon, le compte répond 0 (est-ce le vrai admin ou pas ?)

			if($nbr_utilisateur==0){//on ne l'a pas trouvé ??
			$msg_connexion_err="Erreur  d'authentification !";
			}else{// on trouve l'email et le mdp c'est bien l'admin il est bien inscrit
				$ligne = $sql->fetch();// pour retrouver son nom et prénom
				//echo $email;				
		$_SESSION['connexion']='connecté';//
		$_SESSION['id_utilisateur']=$ligne['id_utilisateur'];
		$_SESSION['prenom']=$ligne['prenom'];	
		$_SESSION['nom']=$ligne['nom'];
		
			header('location:index.php'); // vers la page d'accueil de l'admin
				
			}
}
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
    //$sql = $pdoCV->query(" SELECT * FROM t_utilisateur WHERE id_utilisateur ='1' ");
//    $ligne = $sql->fetch();
    ?>
    <title>Site CV : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    <link type="text/css" href="../css/style_admin.css" rel="stylesheet">
</head>
<body>
    <div id="enveloppe">
        <header></header>
    <!--            fin header-->
        <div id="menu"></div>
    <!--        fin de menu-->
<!--        fin de menu-->
    <div id="contenuPrincipal">
        <p>Bienvenue</p>
        <form action="authentification.php" method="post" id="VOIR">
              <fieldset>
    				<legend>
                   		Je m'identifie
                    	<?php //echo "<br>".$msg_connexion_err; ?>
                    	<?php //echo "<br>".$msg_connexion_ok; ?>
                    </legend>
                      <label for="email">Email // </label>
					   <input name="email" type="email" required id="email" placeholder="rentrez votre email" tabindex="1" size="35">
					   <label for="mdp">Mot de passe // </label>
					   <input name="mdp" type="password" required tabindex="2" size="10" maxlength="10">
            </fieldset>  
            <input type="reset" tabindex="3" value="Effacer"> 
            ///// 
            <input name="connexion" type="submit" tabindex="4" value="Me connecter">
            <p><a href="#" class="texte_petit" onClick="montrerform()">J'ai oublié mon mot de passe …</a></p>
            <div id="reponse"></div>
      </form>
<!--       fin formulaire de login
-->        <p>&nbsp;</p>
    </div>
<!--        fin de contenu principal-->
    <div class="clear"></div>
<!--        fin de clear -->
    <footer>
    Site CV 
    </footer>
<!--        fin de footer-->
    </div>
<!--    fin d'enveloppe-->
</body>
</html>