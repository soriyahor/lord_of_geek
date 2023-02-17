<?php

include 'App/modele/M_commande.php';

/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
    case 'passerCommande' :
        $n = nbJeuxDuPanier();
        if ($n > 0) {
            $nom = '';
            $prenom='';
            $numRue='';
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
        $prenom = filter_input(INPUT_POST, 'prenom');
        $numRue = filter_input(INPUT_POST, 'numRue');
        $rue = filter_input(INPUT_POST, 'rue');
        $ville = filter_input(INPUT_POST, 'ville');
        $cp = filter_input(INPUT_POST, 'cp');
        $mail = filter_input(INPUT_POST, 'mail');
        $errors = M_Commande::estValide($nom, $prenom, $numRue, $rue, $ville, $cp, $mail);
        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
        } else {
            $lesIdJeu = getLesIdJeuxDuPanier();
            M_Commande::creerCommande($nom, $prenom, $numRue, $rue, $cp, $ville, $mail, $lesIdJeu);
            supprimerPanier();
            afficheMessage("Commande enregistrée");
            $uc = '';
        }
        break;
}



