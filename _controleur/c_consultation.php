<?php
include '_modele/M_categorie.php';
include '_modele/M_exemplaire.php';

/**
 * Controleur pour la consultation des exemplaires
 * @author Loic LOG
 */
$model_cat = new M_categorie();
$model_ex = new M_exemplaire();

switch ($action) {
    case 'voirJeux' :
        $categorie = filter_input(INPUT_GET, 'categorie');
        $lesJeux = $model_ex->getLesJeuxDeCategorie($categorie);        
        break;
    case 'ajouterAuPanier' :
        $idJeu = filter_input(INPUT_GET, 'jeu');
        $categorie = filter_input(INPUT_GET, 'categorie');
        if (!ajouterAuPanier($idJeu)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        }else{
            afficheMessage("Ce jeu a été ajouté");
        }
        $lesJeux = $model_ex->getLesJeuxDeCategorie($categorie);
        break;
    default:
        $lesJeux = [];
        break;
}

$lesCategories = $model_cat->getLesCategories();
