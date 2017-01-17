<?php require '../connexion/connexion.php' ?>
<?php
//gestion des contenus mise à jour d'une expérience
    if(isset($_POST['titre_e'])){//par le nom du premier input 
    
    $titre_e = addslashes($_POST['titre_e']);
    $sous_titre_e = addslashes($_POST['sous_titre_e']);
    $dates_e = addslashes($_POST['dates_e']);
    $description_e = addslashes($_POST['description_e']);
	$utilisateur_id = $_POST['utilisateur_id'];   
    $id_experience = $_POST['id_experience'];         
        
    $pdoCV->exec(" UPDATE t_experiences SET titre_e='$titre_e', sous_titre_e='$sous_titre_e', dates_e='$dates_e', description_e='$description_e' WHERE id_experience='$id_experience' ");

        header('location: ../admin/experiences.php'); //le header pour revenir à la liste des compétences de l'utilisateur
    exit();
}
    //je récupère la compétence
    $id_experience = $_GET['id_experience']; // par l'id_experience et $_GET
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
        <h1>Admin : Modification d'une expérience</h1>
    <form action="modif_experience.php" method="post">
        <table border="1">
            <tr>
                <td>Modification d'une expérience</td>
                <td>
                <input type="text" name="titre_e" size="50" value="<?php echo $ligne_experience['titre_e']; ?>" required >
                <input type="text" name="sous_titre_e" size="50" value="<?php echo $ligne_experience['sous_titre_e']; ?>" required >
                    <input type="text" name="dates_e" size="50" value="<?php echo $ligne_experience['dates_e']; ?>" required >
                    <textarea name="description_e" id="editor1" size="100" cols="80" rows="10" required><?php echo $ligne_experience['description_e']; ?></textarea>
                    <script>
                                // Replace the <textarea id="editor1"> with a CKEditor instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
                <input hidden name="utilisateur_id" value="<?php echo $ligne_experience['utilisateur_id']; ?>">
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