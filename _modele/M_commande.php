<?php
require_once './_modele/AccesDonnees.php';
require_once './util/validateurs.inc.php';

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_commande {

    private $erreurs = array();

    /**
     * Crée une commande 
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $nom 
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    public function creerCommande($nom, $rue, $cp, $ville, $mail, $listJeux) {
        $req = "insert into commande(nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient) values ('$nom','$rue','$cp','$ville','$mail')";
        $res = AccesDonnees::exec($req);
        $idCommande = AccesDonnees::getPdo()->lastInsertId();
        foreach ($listJeux as $jeu) {
            $req = "insert into lignes_cmd(id_commande, id_exemplaire) values ('$idCommande','$jeu')";
            $res = AccesDonnees::exec($req);
        }
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne 
     * @return : boolean 
     */
    public function estValide($nom, $rue, $ville, $cp, $mail) {
        if ($nom == "") {
            $this->erreurs[] = "Il faut saisir le champ nom";
        }
        if ($rue == "") {
            $this->erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $this->erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $this->erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $this->erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $this->erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
                $this->erreurs[] = "erreur de mail";
        }
        return count($this->erreurs) == 0;
    }
    
    /**
     * 
     * @return array
     */
    public function getErreurs() {
        return $this->erreurs;
    }

}
