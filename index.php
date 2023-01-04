<?php
session_start();


// Pour afficher les erreurs PHP 
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Attention : A supprimer en production !!!

require_once("util/fonctions.inc.php");

$uc = filter_input(INPUT_GET, 'uc'); // Use Case
$action = filter_input(INPUT_GET, 'action');// Action
initPanier();

include("_vue/template.html.php");

