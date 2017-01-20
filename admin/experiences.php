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
    //insertion d'une expérience
    if(isset($_POST['titre_e'])){// si on crée une nouvelle expérience et son titre
        if($_POST['titre_e']!='' && $_POST['sous_titre_e']!='' && $_POST['dates_e']!='' && $_POST['description_e']!='' ){// si un champs n'est pas vide
            $titre_e = addslashes($_POST['titre_e']);
            $sous_titre_e = addslashes($_POST['sous_titre_e']);
            $dates_e = addslashes($_POST['dates_e']);
            $description_e = addslashes($_POST['description_e']);
            
        $pdoCV->exec(" INSERT INTO t_experiences VALUES (NULL, '$titre_e', '$sous_titre_e', '$dates_e', '$description_e', '$id_utilisateur' ) ");
            header("location: ../admin/experiences.php");
                exit();
            }//ferme le if
        }//ferme if(isset)

//Suppression d'une expérience
    if(isset($_GET['id_experience'])){
            $efface = $_GET['id_experience'];
            $sql = " DELETE FROM t_experiences WHERE id_experience = '$efface' ";
            $pdoCV -> query($sql);// ou à la rigueur exec
        header('location: ../admin/experiences.php'); //le header pour revenir sur la page et ne plus avoir l'url avec le ?
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <?php 
            $sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur' ");
            $ligne = $sql->fetch();
    ?>
	<title>Site CV admin : <?php echo $prenom.' '.$nom; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
	<link type="text/css" href="../css/style_admin.css" rel="stylesheet">
<!--    CKEditor-->
        <script src="../ckeditor/ckeditor.js"></script>
</head>
    <body>
        <div id="enveloppe">
		<header><?php include ("admin_en_tete.php"); ?></header>
<!--            fin header-->
            <div id="menu"><?php include ("admin_menu.php"); ?></div>
<!--            fin de menu-->
		<div id="contenuPrincipal">
            <h1>Admin : les expériences</h1>
          <form action="experiences.php" method="post">
            <table border="1">
                <caption>Insertion d'une nouvelle expérience</caption>
                       <tbody>
                        <tr>
                            <td>Titre expérience</td>
                            <td><input type="text" name="titre_e" id="titre_e" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Sous-titre expérience</td>
                            <td><input type="text" name="sous_titre_e" id="sous_titre_e" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Dates</td>
                            <td><input type="text" name="dates_e" id="dates_e" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><textarea name="description_e" id="editor1" cols="80" rows="10" required></textarea></td>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
                        </tr>
                        <tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Insérer une expérience"></td>
                        </tr>
						</tbody>
                    </table>
            </form>
<!--            fin form insertion-->
            <?php
                $sql = $pdoCV->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1' "); // prépare la requête
                $sql->execute(); // exécute-la
                $nbr_experiences = $sql->rowCount(); //compte les lignes
            ?>
            <p>Il y a <?php echo $nbr_experiences; ?> expériences</p>
            <table width="600" border="2">
				<caption>Liste des expériences</caption>
				<tr>
					<th>Expériences</th>
					<th>Texte</th>
                    <th>Action</th>
				</tr>
			<tr>
			<?php while ($ligne = $sql->fetch()) { ?>
					<td><?php echo $ligne['titre_e'].' <br>'.$ligne['sous_titre_e'].'<br>'.$ligne['dates_e']; ?></td>
                <td><?php echo $ligne['description_e']; ?> </td>
                <td><p><a href="experiences.php?id_experience=<?php echo $ligne['id_experience']; ?>">Supprimer</a><br><a href="modif_experience.php?id_experience=<?php echo $ligne['id_experience']; ?>">Modifier</a></p></td>
            </tr>
            
			<?php } ?>
<!--                fin de while-->
			</table>
			</div>
<!--            fin de contenu principal-->
            <div class="clear"></div>
<!--            fin de clear-->
        <footer><?php include ("admin_footer.php"); ?></footer>
<!--            fin de footer-->
		</div>
<!--        fin de enveloppe-->
    </body>
</html>