<?php require '../connexion/connexion.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
        <?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
            $sql = $pdoCV->query(" SELECT * FROM t_utilisateur WHERE id_utilisateur ='1' ");
            $ligne = $sql->fetch();
        ?>
    <title>Site CV : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>
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
        <h1>Espace administratif du site CV : accueil</h1>
    <?php 
    echo '<p>Hola '.$ligne['prenom'].' '.$ligne['nom'].'<br>
    <img src="../img/" alt="">
    </p>';
    ?>
    <table width="500px" border="1">
        <caption>Infos utilisateur</caption>
        <thead>
            <th>Nom, prénom etc.</th>
            <th>Etat civil</th>
        </thead>
        <tr>
            <td>
                <?php echo '<p>'.$ligne['etat_civil'].' '.$ligne['prenom'].' '.$ligne['nom'].'<br>
                '.$ligne['adresse'].'<br>'.$ligne['code_postal'].' '.$ligne['ville'].'<br><br> '.$ligne['email'].' <br><br> mot de passe : '.$ligne['mdp'].'
                </p>'; ?>
            </td>
            <td>
                <?php echo '<p>âge : '.$ligne['age'].' ans<br>date de naissance : '.$ligne['date_naissance'].'<br>
            '.$ligne['statut_marital'].'<br></p>'; ?>
            </td>
        </tr>
        <tr>
            <td>
                02 1  
            </td>
            <td>
                02 2
            </td>
        </tr>
    </table>
        </div>
<!--        fin de contenuPrincipal-->
    <div class="clear"></div>
<!--    fin de clear-->
    <footer>
    <?php include ("admin_footer.php"); ?>
    </footer>
<!--    fin de footer-->
    </div>
<!--    fin de contenu-->
</body>
</html>