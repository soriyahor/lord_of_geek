<section id="compteInscription">
    <form method="POST" action="index.php?uc=inscrire&action=inscription">
        <fieldset>
            <legend>Insccription</legend>
            <p>
                <label for="nom">Nom*</label>
                <input id="nom" type="text" name="nom" size="30" maxlength="45">
            </p>
            <p>
                <label for="prenom">Prénom*</label>
                <input id="prenom" type="text" name="prenom" size="30" maxlength="45">
            </p>
            <p>
                <label for="numRue"> numéro de rue*</label>
                <input id="numRue" type="text" name="numRue" size="30" maxlength="45">
            </p>
            <p>
                <label for="rue">rue*</label>
                <input id="rue" type="text" name="rue" size="30" maxlength="45">
            </p>
            <p>
                <label for="cp">code postal* </label>
                <input id="cp" type="text" name="cp" size="10" maxlength="10">
            </p>
            <p>
                <label for="ville">ville* </label>
                <input id="ville" type="text" name="ville"  size="30" maxlength="45">
            </p>
            <p>
                <label for="mail">mail* </label>
                <input id="mail" type="text"  name="mail"size ="25" maxlength="25">
            </p> 
            <p>
                <label for="mdp">mot de passe* </label>
                <input id="mdp" type="password"  name="mdp"size ="25" maxlength="25">
            </p> 
            <p>
                <label for="confirmMdp">Confirmer le mot de passe* </label>
                <input id="confirmMdp" type="password"  name="confirmMdp"size ="25" maxlength="25">
            </p> 
            <p>
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" name="annuler">
            </p>

    </form>
</section>