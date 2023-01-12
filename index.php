<?php
session_start();


// Pour afficher les erreurs PHP 
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Attention : A supprimer en production !!!

require_once("util/fonctions.inc.php");

$uc = filter_input(INPUT_GET, 'uc'); // Use Case
$action = filter_input(INPUT_GET, 'action'); // Action
initPanier();

if(!$uc){
    $uc = 'accueil';
}

// Controleur principale
switch ($uc) {
    case 'visite' :
        include '_controleur/c_consultation.php';
        break;
    case 'panier' :
        include '_controleur/c_gestionPanier.php';
        break;
    case 'commander':
        include '_controleur/c_passerCommande.php';
        break;
    case 'administrer' :
        include '_controleur/c_gestionJeux.php';
        break;
    default:
        break;
}


include("_vue/template.php");

