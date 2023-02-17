<section id="compteConnexion">
    <form method="POST" action="index.php?uc=administrer&action=connexion">
        <fieldset>
            <legend>Connexion</legend>
            <p>
                <label for="mail">Email*</label>
                <input id="mail" type="text" name="mail" size="30" maxlength="45">
            </p>
            <p>
                <label for="mdp">Mot de passe*</label>
                <input id="mdp" type="text" name="mdp" size="30" maxlength="45">
            </p>
            <p>
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" name="annuler">
            </p>

    </form>
</section>