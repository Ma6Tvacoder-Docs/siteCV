<?php require '../connexion/connexion.php' ?>
<?php
    if(isset($_POST['titre_e'])){// si on crée une nouvelle expérience et son titre
        if($_POST['titre_e']!='' && $_POST['sous_titre_e']!='' && $_POST['dates']!='' && $_POST['description']!='' && $_POST['id_competence']!=''){// si competence n'est pas vide
            $titre_e = addslashes($_POST['titre_e']);
            $sous_titre_e = addslashes($_POST['sous_titre_e']);
            $dates = addslashes($_POST['dates']);
            $description = addslashes($_POST['description']);
            $id_competence = addslashes($_POST['id_competence']);
            
        $pdoCV->exec(" INSERT INTO t_experiences VALUES (NULL, '$titre_e', '$sous_titre_e', '$dates', '$description', '$id_competence' ) ");
            header("location: ../admin/experiences.php");
                exit();
            }//ferme le if
        }//ferme if(isset)    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
            $sql = $pdoCV->query(" SELECT * FROM t_utilisateur");
            $ligne = $sql->fetch();
    ?>
	<title>Site CV : compétences : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>
	<link type="text/css" href="../css/style_admin.css" rel="stylesheet">
</head>
    <body>
        <div id="contenu">
		<header>
            <?php include ("admin_en_tete.php"); ?>
		</header>
            <h1>Les expériences</h1>
            <div id="menu">
                <h2>Connexion : déconnexion</h2>
                <?php include ("admin_menu.php"); ?>
            </div>
		<div id="contenuPrincipal">VOIR
            <div>
                <form action="experiences.php" method="post">
                    <table width="200px" border="1">
                        <tr>
                            <td>Titre expérience</td>
                            <td><input type="text" name="titre_e" id="titre_e" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Sous-titre expérience</td>
                            <td><input type="text" name="sous_titre_e" id="sous_titre_e" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><input type="text" name="dates" id="dates" size="50" required></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><textarea name="description" id="description" size="50" required></textarea></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Compétence</td>
                            <td><input type="text" name="id_competence" id="id_competence" size="50" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Insérer une expérience"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
                $sql = $pdoCV->prepare("SELECT * FROM t_experiences"); // prépare la requête
                $sql->execute(); // exécute-la
                $nbr_experiences = $sql->rowCount(); //compte les lignes
            ?>
            <p>Il y a <?php echo $nbr_experiences; ?> expériences</p>
            <table border="2">
				<caption>Liste des expériences</caption>
				<thead>
					<th>Expériences</th>
					<th>Suppression</th>	
				</thead>
			<tr>
			<?php while ($ligne = $sql->fetch()) { ?>
					<td><?php echo $ligne['titre_e']; ?> <?php echo $ligne['dates']; ?></td>
					<td><a href="#">Supprimer l'enregistrement</a></td>
			</tr>
			<?php } ?>
			</table>
            <div class="clear"></div>
        <footer>
        <?php include ("admin_footer.php"); ?>
        </footer>
        </div>
    </body>
</html>