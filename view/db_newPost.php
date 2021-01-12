<?php $title = "Nouveau chapitre"; ?>
<?php ob_start(); ?>

<div>
    <h2 class="titre1">Nouveau chapitre:</h2>
</div>

<section>
    <form action="index.php?action=storeTicket" method="post" class="formtiny" >
        <label for="titre">Titre du chapitre:</label><br />
        <input class="pseudo" type="text" name="titre" /><br /><br />
        <label for="contenu">Contenu du chapitre:</label><br>
        <textarea id="tiny" name="contenu" rows="25" cols="130">Votre texte ici ...</textarea><br />
        <input class="button buttonform" type="submit" value="Envoyer" />
	</form> 

    <div id="retour" class="button"><a href="index.php?action=dashboard" title="aller à la page connexion">Annuler</a></div>  
</section>

<?php
$content = ob_get_clean();
require 'layoutDashboard.php';
?>   