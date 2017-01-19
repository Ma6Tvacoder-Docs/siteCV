<?php require '../connexion/connexion.php' ?>
<?php
	
session_start();// à mettre dans toutes les pages SESSION et identification
// faire ensuite le require si on veut sur toutes les pages admin
	if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ //si la personne est connectée et la valeur est bien celle de la page authentification
			$id_utilisateur=$_SESSION['id_utilisateur'];
			$prenom=$_SESSION['prenom'];	
			$nom=$_SESSION['nom'];	
		echo $_SESSION['connexion']; //vérification de la connexion
	}else{// l'utilisateur n'est pas connecté
		header('location:authentification.php');
	}
//pour se déconnecter
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
<?php
//gestion des contenus mise à jour d'une compétence
    if(isset($_POST['competence'])){//par le nom du premier input 
    
    $competence = addslashes($_POST['competence']);
	$id_competence = $_POST['id_competence']; 
    $pdoCV->exec(" UPDATE t_competences SET competence='$competence' WHERE id_competence='$id_competence' ");

        header('location: ../admin/competences.php'); //le header pour revenir à la liste des compétences de l'utilisateur
    exit();
}
    //je récupère la compétence
    $id_competence = $_GET['id_competence']; // par l'id_competence et $_GET
    $sql=  $pdoCV->query(" SELECT * FROM t_competences WHERE id_competence = '$id_competence' ");
    $ligne_competence = $sql->fetch();

?> 
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
    $sql = $pdoCV->query(" SELECT * FROM t_utilisateurs");
    $ligne = $sql->fetch();
?>
<title>Site CV : compétences : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<link type="text/css" href="../css/style_admin.css" rel="stylesheet">
</head>
<body>
    <div id="enveloppe">
    <header>
        <?php include ("admin_en_tete.php"); ?>
    </header>
    <div id="menu">
        <?php include ("admin_menu.php"); ?>
    </div>
<!--        fin de menu-->
    <div id="contenuPrincipal">
        <h1>Admin : Modification d'une compétence</h1>
    <form action="modif_competence.php" method="post">
        <table width="200px" border="1">
            <tr>
                <td>Modification d'une compétence</td>
                <td>
                <input type="text" name="competence" size="50" value="<?php echo $ligne_competence['competence']; ?>" required >
                <input hidden name="id_competence" value="<?php echo $ligne_competence['id_competence']; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Mettre à jour"></td>
            </tr>
        </table>
    </form>
<!--        fin form de modification-->
    </div>
    <div class="clear"></div>
<!--        fin de clear-->
    <footer>
        <?php include ("admin_footer.php"); ?>
    </footer>
<!--        fin de footer-->
    </div>
<!--    fin de enveloppe-->
</body>
</html>