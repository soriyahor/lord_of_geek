<?php
include '_modele/M_exemplaire.php';
/**
 * Controleur pour la gestion du panier
 * @author Loic LOG
 */
$model_ex = new M_exemplaire();

switch ($action) {
    case 'supprimerUnJeu':
        $idJeu = filter_input(INPUT_GET, 'jeu');
        retirerDuPanier($idJeu);
    case 'voirPanier':
        $n = nbJeuxDuPanier();
        if ($n > 0) {
            $desIdJeu = getLesIdJeuxDuPanier();
            $lesJeuxDuPanier = $model_ex->getLesJeuxDuTableau($desIdJeu);
        } else {
            afficheMessage("Panier Vide !!");
            $uc = '';
        }
        break;
}



