<?php

require_once("./_modele/AccesDonnees.php");

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_categorie {

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories 
     */
    public function getLesCategories() {
        $req = "SELECT * FROM categorie";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

}
