<?php
include '_modele/M_exemplaire.php';
/**
 * Controleur pour la gestion du panier
 * @author Loic LOG
 */
$model_ex = new M_exemplaire();

switch ($action) {
    case 'voirPanier':
        $n = nbJeuxDuPanier();
        if ($n > 0) {
            $desIdJeu = getLesIdJeuxDuPanier();
            $lesJeuxDuPanier = $model_ex->getLesJeuxDuTableau($desIdJeu);
            include("_vue/v_panier.php");
        } else {
            afficheMessage("Panier Vide !!");
        }
        break;
    case 'supprimerUnJeu':
        $idJeu = filter_input(INPUT_GET, 'jeu');
        retirerDuPanier($idJeu);
        $desIdJeu = getLesIdJeuxDuPanier();
        $lesJeuxDuPanier = $model_ex->getLesJeuxDuTableau($desIdJeu);
        include("_vue/v_panier.php");
        break;
}



