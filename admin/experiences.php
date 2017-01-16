<?php require '../connexion/connexion.php' ?>
<?php
    //insertion d'une expérience
    if(isset($_POST['titre_e'])){// si on crée une nouvelle expérience et son titre
        if($_POST['titre_e']!='' && $_POST['sous_titre_e']!='' && $_POST['dates_e']!='' && $_POST['description_e']!='' ){// si un champs n'est pas vide
            $titre_e = addslashes($_POST['titre_e']);
            $sous_titre_e = addslashes($_POST['sous_titre_e']);
            $dates_e = addslashes($_POST['dates_e']);
            $description_e = addslashes($_POST['description_e']);
            
        $pdoCV->exec(" INSERT INTO t_experiences VALUES (NULL, '$titre_e', '$sous_titre_e', '$dates_e', '$description_e', '1' ) ");
            header("location: ../admin/experiences.php");
                exit();
            }//ferme le if
        }//ferme if(isset)

//Suppression d'une compétence
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
    <?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
            $sql = $pdoCV->query(" SELECT * FROM t_utilisateur WHERE id_utilisateur = '1' ");
            $ligne = $sql->fetch();
    ?>
	<title>Site CV : expériences : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>
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
            <h1>Admin : les expériences</h1>
          <form action="experiences.php" method="post">
            <table width="250px" border="1">
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
                            <td><textarea name="description_e" id="description_e" size="100" cols="80" rows="10" required></textarea></td>
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
            <table width="400" border="2">
				<caption>Liste des expériences</caption>
				<tr>
					<th>Expériences</th>
					<th>Suppression</th>	
				</tr>
			<tr>
			<?php while ($ligne = $sql->fetch()) { ?>
					<td><?php echo $ligne['titre_e']; ?> <?php echo $ligne['dates_e']; ?></td>
					<td><a href="experiences.php?id_experience=<?php echo $ligne['id_experience']; ?>">Supprimer</a></td>
                    <td><a href="modif_experience.php?id_experience=<?php echo $ligne['id_experience']; ?>">Modifier</a></td>
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