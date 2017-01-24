<?php require '../connexion/connexion.php' ?>
<?php
	
session_start();// à mettre dans toutes les pages SESSION et identification
// faire ensuite le require si on veut sur toutes les pages admin
	if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ //si la personne est connectée et la valeur est bien celle de la page authentification
			$id_utilisateur=$_SESSION['id_utilisateur'];
			$prenom=$_SESSION['prenom'];	
			$nom=$_SESSION['nom'];	
		//echo $_SESSION['connexion']; //vérification de la connexion
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
//gestion des contenus mise à jour du titre du CV
    if(isset($_POST['titre_cv'])){//par le nom du premier input 
    
    $titre_cv = addslashes($_POST['titre_cv']);
    $accroche = addslashes($_POST['accroche']);
    $logo = addslashes($_POST['logo']);
	$utilisateur_id = $_POST['utilisateur_id'];   
    $id_titre_cv = $_POST['id_titre_cv'];         
        
    $pdoCV->exec(" UPDATE t_titre_cv SET titre_cv='$titre_cv', accroche='$accroche', logo='$logo' WHERE id_titre_cv='$id_titre_cv' ");

        header('location: ../admin/titre_du_cv.php'); //le header pour revenir à la liste des compétences de l'utilisateur
    exit();
}
    //je récupère le titre du CV
    $id_titre_cv = $_GET['id_titre_cv']; // par l'id_experience et $_GET
    $sql=  $pdoCV->query(" SELECT * FROM t_titre_cv WHERE id_titre_cv = '$id_titre_cv' ");
    $ligne_titre_cv = $sql->fetch();
    //echo $id_titre_cv;

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
    <!--    CKEditor-->
        <script src="../ckeditor/ckeditor.js"></script>
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
        <h1>Admin : Modification du titre du CV</h1>
    <form action="modif_titre_cv.php" method="post">
        <table border="1">
            <tr>
                <td>Modification du titre du CV</td>
                <td>
                <input type="text" name="titre_cv" size="50" value="<?php echo $ligne_titre_cv['titre_cv']; ?>" required ><br>
                <input type="text" name="accroche" size="50" value="<?php echo $ligne_titre_cv['accroche']; ?>" required >
                <input type="text" name="logo" size="50" value="<?php echo $ligne_titre_cv['logo']; ?>" required >
                    
                <input hidden name="utilisateur_id" value="<?php echo $ligne_titre_cv['utilisateur_id']; ?>">
                <input hidden name="id_titre_cv" value="<?php echo $ligne_titre_cv['id_titre_cv']; ?>">
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