<?php require '../connexion/connexion.php' ?>
<?php
    //Insertion d'une compétence
        if(isset($_POST['competence'])){// si on crée une nouvelle compétence
            if($_POST['competence']!=''){// si competence n'est pas vide
            $competence = addslashes($_POST['competence']);

            $pdoCV->exec(" INSERT INTO t_competences VALUES (NULL, '$competence', '1' ) ");
            header("location: ../admin/competences.php");
            exit();
            }//ferme le if
        }//ferme if(isset)

    //Suppression d'une compétence
    if(isset($_GET['id_competence'])){
            $efface = $_GET['id_competence'];
            $sql = " DELETE FROM t_competences WHERE id_competence = '$efface' ";
            $pdoCV -> query($sql);// ou à la rigueur exec
        header('location: ../admin/competences.php'); //le header pour revenir sur la page et ne plus avoir l'url avec le ?
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
                <td><input type="text" name="competence" id="competence" size="50" required</td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Insérer une compétence"></td>
            </tr>
        </table>
    </form>
<!--        fin form d'insertion-->
    <p>
    <?php
        $sql = $pdoCV->prepare("SELECT * FROM t_competences"); // prépare la requête
        $sql->execute(); // exécute-la
        $nbr_competences = $sql->rowCount(); //compte les lignes
    ?>
        Il y a <?php echo $nbr_competences; ?> compétences</p>
    <table width="500" border="2">
        <caption>Liste des compétences</caption>
        <tbody>
            <tr>
                <th>Compétences</th>
                <th>Modification</th>
                <th>Suppression</th>
            </tr>
        <tr>
            <?php while ($ligne = $sql->fetch()) { ?>
            <td><?php echo $ligne['competence']; ?></td>
            <td><a href="modif_competence.php?id_competence=<?php echo $ligne['id_competence']; ?>">Modifier</a></td>
            <td><a href="competences.php?id_competence=<?php echo $ligne['id_competence']; ?>">Supprimer</a></td>
        </tr>
            <?php } ?>
<!--            fin while-->
        </tbody>
    </table>
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