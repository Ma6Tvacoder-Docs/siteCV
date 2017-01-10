<!--SELECT SIMPLE UNE SEULE RÉPONSE-->
<?php 
    $sql = $pdoCV->query(" SELECT * FROM t_utilisateur WHERE id_utilisateur ='2' ");
    $ligne = $sql->fetch();
    ?>

<!--SELECT PLUSIEURS ENREGISTREMENT  -->
 <?php
        $sql = $pdoCV->prepare("SELECT * FROM t_competences"); // prépare la requête
        $sql->execute(); // exécute-la
        $nbr_competences = $sql->rowCount(); //compte les lignes
    ?>
<!--COMPTE-->
<p> Il y a <?php echo $nbr_competences; ?> compétences</p>
<!--PUIS WHILE-->
 <?php while ($ligne = $sql->fetch()) { ?>
                <?php echo $ligne['competence']; ?>
                <a href="modif_competence.php?id_competence=<?php echo $ligne['id_competence']; ?>">Modifier</a>
                <a href="competences.php?id_competence=<?php echo $ligne['id_competence']; ?>">Supprimer</a>         
            <?php } ?>
<!--FIN DU WHILE-->

<!--INSERTION-->
      
<?php
if(isset($_POST['competence'])){// si on crée une nouvelle compétence
            if($_POST['competence']!=''){// si competence n'est pas vide
            $competence = addslashes($_POST['competence']);

            $pdoCV->exec(" INSERT INTO t_competences VALUES (NULL, '$competence', '1' ) ");
            header("location: ../admin/competences.php");
            exit();
            }//ferme le if
        }//ferme if(isset)
?>

<!--SUPPRESSION-->

<?php
//Suppression d'une compétence
    if(isset($_GET['id_competence'])){
        $efface = $_GET['id_competence'];// variable pour simplifier la requête
        $sql = " DELETE FROM t_competences WHERE id_competence = '$efface' ";
        $pdoCV -> query($sql);// ou à la rigueur exec pour supprimer les deux fonctionnent
        //header('location: ../admin/competences.php'); le header ne sert que si je le fais depuis une autre page
    }
?>