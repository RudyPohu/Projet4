<!DOCTYPE html> 
<!-- template des pages frontend -->

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="description" content="blog de Jean Forteroche, acteur et écrivain"> 
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <header>
             
<!--le logo-->           
            <div class=entete>
                <div id="logo">
                    <h3> Jean Forteroche, acteur et écrivain </h3>
                </div>
<!--le menu-->
                <nav>
                    <ul  id="menu">
                        <li class="menu"><a href="index.php" title="revenir à l'accueil">Accueil</a></li>
                        <li class="menu"><a href="index.php?action=biography" title="biographie">Biographie</a></li>
                        <li class="menu"><a href="index.php?action=book" title="Roman">Le livre</a></li>
                        <li class="menu">
                            <?php if(isset($_SESSION['id'])) 
                            {
                                ?><a href="index.php?action=dashboard" title="aller à la page connexion">Tableau de bord</a> 
                            <?php 
                            }
                            else {
                                ?><a href="index.php?action=connect" title="aller à la page connexion">Connexion</a>
                            <?php    
                            }
                            ?>
                        </li>

                    </ul>
                </nav>
            </div>
        </header> 

        <div>
            <?= $content ?>
        </div>

        <footer id="footer">            
            <p>Copyright Rudy POHU - Etudiant chez OpenClassrooms - 2020</p>    
        </footer>

	</body>
</html>