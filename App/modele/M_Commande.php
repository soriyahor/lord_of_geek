<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande
{

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
    public static function creerCommande($nom, $prenom, $numRue, $rue, $cp, $ville, $mail, $listJeux)
    {

        $reqVille = "insert into ville(nom) values ('$ville')";
        $resVille = AccesDonnees::exec($reqVille);
        $idVille = AccesDonnees::getPdo()->lastInsertId();

        $reqAdresse = "insert into adresse(numero, rue, cp, id_ville) values ('$numRue', '$rue', '$cp', '$idVille')";
        $resAdresse = AccesDonnees::exec($reqAdresse);
        $idAdresse = AccesDonnees::getPdo()->lastInsertId();

        $reqClient = "insert into clients(nom, prenom, email, id_adresse) values ('$nom','$prenom', '$mail', '$idAdresse')";
        $resClient = AccesDonnees::exec($reqClient);
        $idClient = AccesDonnees::getPdo()->lastInsertId();

        $reqCommande = "insert into commandes(id_clients) values ('$idClient')";

        $resCommande = AccesDonnees::exec($reqCommande);
        $idCommande = AccesDonnees::getPdo()->lastInsertId();




        foreach ($listJeux as $jeu) {
            $req = "insert into lignes_commande(commande_id, exemplaire_id) values ('$idCommande','$jeu')";
            $res = AccesDonnees::exec($req);
        }
    }

    public static function voirCommandes()
    {

        $mail = $_SESSION['mail'];

        $reqClient = "select id from clients where email=:mail";
        $pdo=AccesDonnees::getPdo();
        $statement=$pdo->prepare($reqClient);
        $statement->bindParam(':mail',$mail, PDO::PARAM_STR);
        $statement->execute();
        $idClient = $statement->fetch();
        var_dump($idClient);

        $reqCommande = "select co.id, co.created_at, co.updated_at, co.id_clients,
        lc.quantite, lc.prix,
        etat.statut,
        jeu.nom as nom_jeu, jeu.image, jeu.description, jeu.version,
        console.nom as nom_console, ca.nom as cat
        from commandes as co
        join lignes_commande as lc
        on co.id = lc.commande_id
        join exemplaires as ex
        on lc.exemplaire_id = ex.id
        join jeu
        on ex.id_jeu = jeu.id
        join etat
        on etat.id = ex.id_etat
        join console
        on jeu.id_console = console.id
        join categories as ca
        on ca.id = jeu.id_categories
        where id_clients = :idClient
        order by id";

        $pdo=AccesDonnees::getPdo();
        $statement=$pdo->prepare($reqCommande);
        $statement->bindParam(':idClient',$idClient, PDO::PARAM_INT);
        $statement->execute();
        $resCommande = $statement->fetchAll();
        var_dump($resCommande);
        return $resCommande;
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
     * @return : array
     */
    public static function estValide($nom, $prenom, $numRue, $rue, $ville, $cp, $mail)
    {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ prenom";
        }
        if ($numRue == "") {
            $erreurs[] = "Il faut saisir le champ numéro rue";
        }
        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }
}
