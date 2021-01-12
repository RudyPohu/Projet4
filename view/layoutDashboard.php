<!DOCTYPE html>
<!-- template des pages backend -->

<html class="fonddashboard">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="description" content="blog de Jean Forteroche, acteur et écrivain"> 
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- TinyMCE -->
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
          tinymce.init({
            selector : "#tiny"
          });

        </script>
    </head>

    <body>
        <header>
<!--le logo-->           
            <div class=entete>
                <div id="logo">
                    <h3> Espace Administrateur : Bonjour Jean </h3>
                </div>
<!--le menu-->
                <nav>
                    <ul  id="menu">
                        <li class="menu"><a href="index.php" title="revenir à l'accueil">Retour au site web</a></li>
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