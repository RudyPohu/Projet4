<?php $title = "Modification d'un chapitre"; ?>
<?php ob_start(); ?>


<div>
    <h2 class="titre1">Modification du chapitre: <br>
    	<?php echo htmlspecialchars($ticket->titre()); ?></h2>
</div>

<section>
    <form action="index.php?action=update" method="post" class="formtiny">
        <p>
	        <label for="titre">Titre du chapitre:</label><br /><br />
	        <input class="pseudo" type="text" name="titre" value="<?php echo htmlspecialchars($ticket->titre()); ?>" /><br /><br />
	        <label for="contenu">Contenu du chapitre:</label> : <br /><br />
	        <textarea id="tiny" class="texte" name="contenu" rows="25" cols="150"><?php echo $ticket->contenu(); ?></textarea><br />
			<input type="hidden" name="id" value="<?= $ticket->id() ?>">
	        <input class="button buttonform" type="submit" value="Modifier" />
		</p>
	</form> 

    <div id="retour" class="button"><a href="index.php?action=dashboard" title="aller à la page connexion">Annuler</a></div>    
</section>


<?php
$content = ob_get_clean();
require 'layoutDashboard.php';
?>   