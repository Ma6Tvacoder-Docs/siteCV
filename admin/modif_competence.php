<?php require '../connexion/connexion.php' ?>
<?php
    if(isset($_GET['id_competence'])){
        $select_competence = $_GET['id_competence'];
        $sql = $pdoCV->prepare (" SELECT * FROM t_competences WHERE id_competence = '$select_competence' ");
        $sql->execute(); // exécute-la
        
    } //fin du if isset
    
//    //modification d'une compétence
//    if(isset($_GET['id_competence'])){
//        $modif = $_GET['id_competence'];
//        $sql = " UPDATE FROM t_competences WHERE id_competence = '$modif' ";
//        $pdoCV -> query($sql);// ou à la rigueur exec
//    header('location: ../admin/competences.php'); //le header ne sert que si je le fais depuis une autre page
//    }
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
        <h1>Admin : Les compétences</h1>
    <form action="competences.php" method="post">
        <table width="200px" border="1">
            <tr>
                <td>Compétences</td>
                <td><input type="text" name="competence" id="competence" size="50" required placeholder="<?php echo $ligne_competence['id_competence']; ?>"</td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Modifier la compétence"></td>
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