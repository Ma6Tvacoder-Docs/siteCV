<?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
    $sql = $pdoCV->query(" SELECT * FROM t_utilisateur WHERE id_utilisateur ='1' ");
    $ligne = $sql->fetch();
    ?>

<p>Pied de page</p>    
<p>Copyright : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></p> 