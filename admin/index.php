<?php require '../connexion/connexion.php' ?>
<?php
	
session_start();// à mettre dans toutes les pages SESSION et identification
// faire ensuite le require si on veut sur toutes les pages admin
	if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ //si la personne est connectée et la valeur est bien celle de la page authentification
			$id_utilisateur=$_SESSION['id_utilisateur'];
			$prenom=$_SESSION['prenom'];	
			$nom=$_SESSION['nom'];	
		//echo $_SESSION['connexion']; vérification de la connexion
	}else{// l'utilisateur n'est pas connecté
		header('location:authentification.php');
	}

if(isset($_GET['deconnect'])){
	
	$_SESSION['connexion']='';//on vide les variables de session  
	$_SESSION['id_utilisateur']='';
	$_SESSION['prenom']='';	
	$_SESSION['nom']='';
	
	unset($_SESSION['connexion']); // on supprime cette variable
	
	session_destroy();// on détruit la session
	
	header('location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    
    <title>Site CV : <?php echo $_SESSION['prenom']; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    <link type="text/css" href="../css/style_admin.css" rel="stylesheet">
</head>
<body>
    <div id="enveloppe">
        <header> <?php include ("admin_en_tete.php"); ?></header>
    <!--            fin header-->
        <div id="menu"><?php include ("admin_menu.php"); ?></div>
    <!--        fin de menu-->
<!--        fin de menu-->
    <div id="contenuPrincipal">
       <?php  
		$sql = $pdoCV->query(" SELECT * FROM t_utilisateur WHERE id_utilisateur ='$id_utilisateur' ");
    $ligne = $sql->fetch();
		?>
        <p><?php 
        echo 'Hola '.$prenom.' '.$nom.'<br><img src="../img/" alt="">';
        ?>
        </p>
        <table width="500px" border="1">
        <caption>Infos utilisateur</caption>
        <thead>
            <th>Nom, prénom etc.</th>
            <th>Etat civil</th>
        </thead>
        <tr>
            <td>
                <?php echo '<p>'.$ligne['etat_civil'].' '.$ligne['prenom'].' '.$ligne['nom'].'<br>
                '.$ligne['adresse'].'<br>'.$ligne['code_postal'].' '.$ligne['ville'].'<br><br> '.$ligne['email'].' <br><br> mot de passe : '.$ligne['mdp'].'
                </p>'; ?>
            </td>
            <td>
                <?php echo '<p>âge : '.$ligne['age'].' ans<br>date de naissance : '.$ligne['date_naissance'].'<br>
            '.$ligne['statut_marital'].'<br></p>'; ?>
            </td>
        </tr>
    </table>
        <p>&nbsp;</p>
    <table>
       <?php  
		$sql = $pdoCV->query(" SELECT * FROM t_titre_cv WHERE utilisateur_id ='$id_utilisateur' ");
    $ligne = $sql->fetch();
		?>
        <caption>Titre et accroche du site CV</caption>
        <tr>
            <th>Titre CV</th>
            <td><?php echo $ligne['titre_cv']; ?></td>
        </tr>
        <tr>
            <th>Accroche</th>
            <td><?php echo $ligne['accroche']; ?></td>
        </tr>
        <tr>
            <th>Logo</th>
            <td><img src="../img/<?php echo $ligne['logo']; ?>" alt="<?php echo $ligne['logo']; ?>"></td>
        </tr>
    </table>
    </div>
<!--        fin de contenu principal-->
    <div class="clear"></div>
<!--        fin de clear -->
    <footer>
        <?php include ("admin_footer.php"); ?>
    </footer>
<!--        fin de footer-->
    </div>
<!--    fin d'enveloppe-->
</body>
</html>