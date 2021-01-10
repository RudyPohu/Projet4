<?php $title = "Index"; ?>
<?php ob_start(); ?>

       
<!-- le titre -->   
            <div>
                <h2 class="titre1">Entrer vos identifiants de connexion: </h2>
			</div>	

            <section class="homesection2">
                
                <div class="formulaire">
    				<form action="index.php?action=connexion" method="post">
                        <?php
                        if(isset($_SESSION['errors'])) 
                        {
                            echo $_SESSION['errors'];
                            unset($_SESSION['errors']);
                        }
                        ?>

                        <h2>Votre pseudo:</h2>
                        <input type="text" name="pseudo" class="pseudo">
                        <br /><br />
                        <h2>Votre mot de passe:</h2> 
    					<input type="password" name="pass" class="pseudo">
                        <br /><br /><br />
    					<input class="button buttonform" type="submit" value="valider">
    				</form>		
    			</div>
			</section>
		
	
<?php
$content = ob_get_clean();
require 'layout.php';
?>