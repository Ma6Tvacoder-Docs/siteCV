<?php require '../connexion/connexion.php' ?>
<?php

//mise à jour d'une compétence
    if(isset($_POST['id_competence'])){
    
        //$id_competence = $_POST['id_competence'];
    $competence = addslashes($_POST['competence']); 
    $pdoCV->exec(" UPDATE t_competences SET competence='$competence' WHERE id_competence='$id_competence' ");

    header('location: ../admin/competences.php'); //le header ne sert que si je le fais depuis une autre page
    exit();
}

    $id_competence = $_GET['id_competence']; // par l'id_competence et $_GET

    $sql=  $pdoCV->query(" SELECT * FROM t_competences WHERE id_competence = '$id_competence' ");
    $ligne_competence = $sql->fetch();

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
        <h1>Admin : Modification d'une compétence</h1>
    <form action="modif_competence.php" method="post">
        <table width="200px" border="1">
            <tr>
                <td>Modification d'une compétence</td>
                <td><input type="text" name="id_competence" size="50" value="<?php echo $ligne_competence['competence']; ?>" required placeholder=""</td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="mettre à jour"></td>
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