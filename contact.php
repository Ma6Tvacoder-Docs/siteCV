<form action="linscription_courriels.php" method="post" id="inscription">
           	<fieldset class="fieldset_formulaires">
            <legend><h2>Nom &amp; prénom</h2></legend>
               	<label for="nom">Nom * </label>
                <input name="nom" type="text" required="required" id="nom" placeholder="nom de famille" tabindex="1" size="30" aria-required="true"><br>
                <label for="prenom">Prénom *</label>
                <input name="prenom" type="text" required id="prenom" placeholder="prénom" tabindex="2" size="30" aria-required="true">
            </fieldset>
             <fieldset class="fieldset_formulaires">
             <legend><h2>Identifiant &amp; mot de passe</h2></legend>
                <label for="courriel">Email *</label>
                <input name="courriel" type="email" required id="courriel" placeholder="contact@autojaunejunior.com" tabindex="3" autocomplete="off" size="45" maxlength="50" aria-required="true">
                <label for="motdepasse"> Mot de passe *</label>
                <input name="motdepasse" type="password" required id="motdepasse" placeholder="pas plus de 10 caractères" tabindex="4" size="30" maxlength="10" aria-required="true"><br>
                <label for="motdepasse2"> 
                Confirmation du mot de passe *</label>
                <input name="motdepasse2" type="password" required id="motdepasse2" placeholder="je confirme le mot de passe" tabindex="5" onBlur="verif()" size="30" maxlength="10" aria-required="true" pattern=".{8,10}">
			</fieldset>
            <fieldset class="fieldset_formulaires">
            <legend><h2>Vos coordonnées</h2></legend>
                <p>
                  <label for="tel">Tél. *</label>
                  <input name="tel" type="tel" required id="telephone" placeholder="pour vous joindre rapidement" tabindex="6" size="30" maxlength="15" aria-required="true"><br>
                  <label for="portable">Portable</label>
                  <input name="portable" type="tel" id="portable" placeholder="portable" tabindex="7" size="30"><br>
                  <label for="adresse">Adresse *</label>
                  <textarea name="adresse" cols="35" rows="4" required id="adresse" placeholder="adresse de livraison" tabindex="8" aria-required="true" type="textarea" size="30"></textarea>
                  <br>
                  <label for="code_postal">Code Postal *</label>
                  <input name="code_postal" type="text" required id="code_postal" placeholder="code postal" tabindex="9" size="30" aria-required="true"><br>
                  <label for="ville">Ville *</label>
                  <input name="ville" type="text" required id="ville" placeholder="ville" tabindex="10" size="30" aria-required="true"><br>
                  <label for="pays">Pays *</label>
                  <select name="pays" id="pays" tabindex="11" type="text">
                    <option value="0">Je choisis mon pays</option>
                    <?php 
                    foreach($pdoJR->query("SELECT * FROM t_paysCB ORDER BY paysCBFR ASC") as $ligne_pays)
                        { 
                           echo '<option value="'.$ligne_pays['paysCBFR'].'">'.$ligne_pays['paysCBFR'].'</option>';
                        }
                ?>
                  </select>
                </p>
                <p>
                  les frais de port dépendent de votre zone de livraison
                </p>
              <p class="texte_petit">* Les champs suivis d'un astérique sont obligatoires<br></p>
          </fieldset>
               <div class="boutons_au_centre">
               <input type="reset" class="boutonSuppr" tabindex="12" value="Effacer">
               &nbsp;<input type="submit" class="boutonTout" tabindex="13" value="Inscription">
              
               </div>
      </form>