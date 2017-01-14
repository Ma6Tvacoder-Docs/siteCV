<div id="compte">
        <?php if(isset($_SESSION['connexion'])){ 
		echo '<p><a href="index.php?deconnect=oui">Déconnexion</a> </p>'; 
				} ?>
        
</div>

<!--faire page de déconnexion-->
<ul>
    <li>Utilisateur</li>
        <ul>
            <li><a href="utilisateur.php">Utilisateur</a></li>
        </ul>
    <li>Insertions, modifications</li>
        <ul>
            <li><a href="utilisateurs.php">Utilisateur</a></li>
            <li><a href="titre_du_cv.php">Titre et acroche du site</a></li>
            <li><a href="competences.php">Compétences</a></li>
            <li><a href="loisirs.php">Loisirs</a></li>
            <li><a href="experiences.php">Expériences</a></li>
            <li><a href="loisirs.php">Loisirs</a></li>
            <li><a href="formations.php">Formations</a></li>
            
        </ul>
</ul>