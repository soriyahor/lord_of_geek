<!DOCTYPE html>
<!--
Prototype de Lord Of Geek (LOG)
-->
<html>
    <head>
        <title>Lord Of Geek 2022</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/cssGeneral.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">        
    </head>
    <body>
        <header>
            <!-- Images En-tête --> 
            <img src="public/images/logo.png" alt="Logo Lord Of Geek" />
            <!--  Menu haut-->
            <nav  id="menu">
                <ul>
                    <li><a href="index.php"> Accueil </a></li>
                    <li><a href="index.php?uc=visite&action=voirCategories"> Voir le catalogue de jeux </a></li>
                    <li><a href="index.php?uc=gererPanier&action=voirPanier"> Voir son panier </a></li>
                    <li><a href="index.php?uc=administrer"> Administrer </a></li>
                </ul>
            </nav>
            
        </header>
        <main>
            <?php
            // Selon le cas d'utilisation, j'inclus un controleur ou simplement une vue
            switch ($uc) {                   
                case 'visite' :
                    include '_controleur/c_consultation.php';
                    break;
                case 'gererPanier' :
                    include '_controleur/c_gestionPanier.php';
                    break;
                case  'commander':
                    include '_controleur/c_passerCommande.php';
                    break;
                case 'administrer' :
                    include '_controleur/c_gestionJeux.php';
                    break;
                default:
                    include '_vue/v_accueil.php';
                    break;
            }
            ?>
        </main>
    </body>
</html>
