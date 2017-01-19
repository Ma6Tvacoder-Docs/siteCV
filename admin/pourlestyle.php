<?php require '../connexion/connexion.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
    $sql = $pdoCV->query(" SELECT nom, prenom FROM t_utilisateurs WHERE id_utilisateur ='1' ");
    $ligne = $sql->fetch();
    ?>
    <title>Site CV : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>
    <link type="text/css" href="../css/style_admin.css" rel="stylesheet">
</head>
<body>
<div id="enveloppe">
<header>en-tête</header>
<div id="menu">le menu</div>
<div id="contenuPrincipal">contenu principal</div>
<footer>pied de page</footer>
</div>
</body>
</html>