<?php require '../connexion/connexion.php' ?>
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
    $id_experience = $_GET['id_experience']; // par l'id_competence et $_GET
    $sql=  $pdoCV->query(" SELECT * FROM t_experiences WHERE id_experience = '$id_experience' ");
    $ligne_experience = $sql->fetch();

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
        <h1>Admin : Modification d'une expérience</h1>
    <form action="modif_competence.php" method="post">
        <table width="200px" border="1">
            <tr>
                <td>Modification d'une expérience</td>
                <td>
                <input type="text" name="titre_e" size="50" value="<?php echo $ligne_experience['titre_e']; ?>" required >
                <input hidden name="id_experience" value="<?php echo $ligne_experience['id_experience']; ?>">
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