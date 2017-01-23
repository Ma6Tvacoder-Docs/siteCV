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
    //insertion du titre du CV
    if(isset($_POST['titre_cv'])){// si on crée un nouveau titre
        if($_POST['titre_cv']!='' && $_POST['accroche']!='' && $_POST['logo']!='' ){// si un champs n'est pas vide
            $titre_cv = addslashes($_POST['titre_cv']);
            $accroche = addslashes($_POST['accroche']);
            $logo = addslashes($_POST['logo']);
            
        $pdoCV->exec(" INSERT INTO t_titre_cv VALUES (NULL, '$titre_cv', '$accroche', '$logo', '$id_utilisateur' ) ");
            header("location: ../admin/titre_du_cv.php");
                exit();
            }//ferme le if
        }//ferme if(isset)

//Suppression d'une expérience
    if(isset($_GET['id_titre_cv'])){
            $efface = $_GET['id_titre_cv'];
            $sql = " DELETE FROM t_titre_cv WHERE id_titre_cv = '$efface' ";
            $pdoCV -> query($sql);// ou à la rigueur exec
        header('location: ../admin/titre_du_cv.php'); //le header pour revenir sur la page et ne plus avoir l'url avec le ?
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
</head>
    <body>
        <div id="enveloppe">
		<header><?php include ("admin_en_tete.php"); ?></header>
<!--            fin header-->
            <div id="menu"><?php include ("admin_menu.php"); ?></div>
<!--            fin de menu-->
		<div id="contenuPrincipal">
            <h1>Admin : le titre du CV</h1>
          <form action="titre_du_cv.php" method="post">
            <table border="1">
                <caption>Insertion d'un nouveau titre</caption>
                       <tbody>
                        <tr>
                            <td>Titre du CV</td>
                            <td><input type="text" name="titre_cv" id="titre_cv" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Accroche</td>
                            <td><input type="text" name="accroche" id="accroche" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Logo</td>
                            <td><input type="text" name="logo" id="logo" size="50" required></td>
                        </tr>
                        <tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Insérer un titre pour le cv"></td>
                        </tr>
						</tbody>
                    </table>
            </form>
<!--            fin form insertion-->
            <?php
                $sql = $pdoCV->prepare(" SELECT * FROM t_titre_cv WHERE utilisateur_id = '$id_utilisateur' ORDER BY id_titre_cv DESC "); // prépare la requête
                $sql->execute(); // exécute-la
                $nbr_experiences = $sql->rowCount(); //compte les lignes
            ?>
            <p>Il y a <?php echo $nbr_experiences; ?> titre</p>
            <table width="600" border="2">
				<caption>Titre du CV</caption>
				<tr>
					<th>Titre du CV et accroche</th>
					<th>Logo</th>
                    <th>Action</th>
				</tr>
			<tr>
			<?php while ($ligne = $sql->fetch()) { ?>
					<td><?php echo $ligne['titre_cv'].' <br>'.$ligne['accroche']; ?></td>
                <td><img src="../img/<?php echo $ligne['logo']; ?>"></td>
                <td><p><a href="titre_du_cv.php?id_titre_cv=<?php echo $ligne['id_titre_cv']; ?>">Supprimer</a><br>
                    <a href="modif_titre_du_cv.php?id_titre_cv=<?php echo $ligne['id_titre_cv']; ?>">Modifier</a></p></td>
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