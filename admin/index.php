<?php require '../connexion/connexion.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <?php /*SELECT SIMPLE UNE SEULE RÉPONSE */
            $sql = $pdoCV->query(" SELECT nom, prenom FROM t_utilisateur");
            $ligne = $sql->fetch();
    ?>
	<title>Site CV : <?php echo $ligne['prenom'].' '.$ligne['nom']; ?></title>
	<link type="text/css" href="../css/style_admin.css" rel="stylesheet">
</head>
    <body>
        <div id="contenu">
		<header>
            <?php include ("admin_en_tete.php"); ?>
		</header>
            <h1>Espace administratif du site CV</h1>
            <div id="menu">
                <h2>Connexion : déconnexion</h2>
                <?php include ("admin_menu.php"); ?>
            </div>
		<div id="contenuPrincipal">
                 <?php 
                        echo '<p>Hola '.$ligne['prenom'].' '.$ligne['nom'].'<br>
                            <img src="../img/" alt="">
                            </p>';
            ?>
            </div>
            <div class="clear"></div>
        <footer>
        <?php include ("admin_footer.php"); ?>
        </footer>
	       </div>
        </div>
    </body>
</html>