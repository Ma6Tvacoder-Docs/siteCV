<?php require '../connexion/connexion.php' ?>
<?php
    if(isset($_POST['competence'])){// si on crée une nouvelle compétence
        if($_POST['competence']!=''){// si competence n'est pas vide
            $competence = addslashes($_POST['competence']);
            
        $pdoCV->exec(" INSERT INTO t_competences VALUES (NULL, '$competence' ) ");
            header("location: ../admin/competences.php");
                exit();
            }//ferme le if
        }//ferme if(isset)    
?>
<?php
if(isset($_GET['efface'])){
    $sql = " DELETE FROM t_competences WHERE id_competence = '.$_GET['efface'].' ";
    $resultat = $pdoCV -> query($sql);
    header('location: ../admin/competences.php');
}
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
            <h1>Les compétences</h1>
            <div id="menu">
                <h2>Connexion : déconnexion</h2>
                <?php include ("admin_menu.php"); ?>
            </div>
		<div id="contenuPrincipal">VOIR
            <div>
                <form action="competences.php" method="post">
                    <table width="200px" border="1">
                        <tr>
                            <td>Compétences</td>
                            <td><input type="text" name="competence" id="competence" size="50" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Insérer une compétence"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
                $sql = $pdoCV->prepare("SELECT * FROM t_competences"); // prépare la requête
                $sql->execute(); // exécute-la
                $nbr_competences = $sql->rowCount(); //compte les lignes
            ?>
            <p>Il y a <?php echo $nbr_competences; ?> compétences</p>
            <table width="500" border="2">
				<caption>Liste des compétences</caption>
			<tbody>
			<tr>
				<th>Compétences</th>
				<th>Suppression</th>
			</tr>
			<tr>
			<?php while ($ligne = $sql->fetch()) { ?>
				<td><?php echo $ligne['competence']; ?></td>
				<td><a href="?efface=<?php echo $resultat['id_competence']; ?>">Supprimer l'enregistrement</a></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			</div>
       <div class="clear"></div>
        <footer>
        <?php include ("admin_footer.php"); ?>
        </footer>
        </div>
    </body>
</html>