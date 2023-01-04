<?php

// permet de le charger qu'une seule fois s'il est déjà charger, il ne fait rien
require_once("./_modele/AccesDonnees.php");

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_exemplaire {

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     * 
     * @param $idCategorie 
     * @return un tableau associatif  
     */
    public function getLesJeuxDeCategorie($idCategorie) {
        $req = "SELECT * FROM exemplaire WHERE id_categorie = '$idCategorie'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    
        /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif 
     */
    public function getLesJeuxDuTableau($desIdJeux) {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdJeux as $unIdProduit) {
                $req = "SELECT * FROM exemplaire WHERE id = '$unIdProduit'";
                $res = AccesDonnees::query($req);
                $unProduit = $res->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }

}
