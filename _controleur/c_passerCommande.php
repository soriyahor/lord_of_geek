<?php
include '_modele/M_commande.php';

/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
$model_cmd = new M_commande();

switch ($action) {
    case 'passerCommande' :
        $n = nbJeuxDuPanier();
        if ($n > 0) {
            $nom = '';
            $rue = '';
            $ville = '';
            $cp = '';
            $mail = '';            
        } else {
            afficheMessage("Panier vide !!");
            $uc = '';
        }
        break;
    case 'confirmerCommande' :
        $nom = filter_input(INPUT_POST, 'nom');
        $rue = filter_input(INPUT_POST, 'rue');
        $ville = filter_input(INPUT_POST, 'ville');
        $cp = filter_input(INPUT_POST, 'cp');
        $mail = filter_input(INPUT_POST, 'mail');
        if(!$model_cmd->estValide($nom, $rue, $ville, $cp, $mail)){
            // Si une erreur, on recommence
            afficheErreurs($model_cmd->getErreurs());
        }else{
            $lesIdJeu = getLesIdJeuxDuPanier();
            $model_cmd->creerCommande($nom, $rue, $cp, $ville, $mail, $lesIdJeu);
            supprimerPanier();
            afficheMessage("Commande enregistrée");
            $uc = '';
        }
        break;
}



