<?php $title = "Suppression d'un chapitre"; ?>
<?php ob_start(); ?>

<div>
	<h2 class="titre1">Voulez-vous vraiment supprimer le chapitre suivant ? <br />
</div>

<section>
	<div class="ticket">     
        <h2>
            <?php echo htmlspecialchars($ticket->titre()); ?>
            <em>le <?php echo $ticket->getDate(); ?></em>
        </h2> 
        <p>
            <?php echo htmlspecialchars($ticket->contenu()); ?>
        </p>    
    </div>
</section>

<section>
	<div id="retour" class="button"> <a onclick="return confirm('Etes vous sur de vouloir supprimer ce chapitre ?')" href="index.php?action=delete&ticket_id=<?= $ticket->id() ?>" title="supprimer le chapitre">Confirmer</a></div>
	<br />
    <div id="retour" class="button"> <a href="index.php?action=dashboard" title="aller à la page connexion">Annuler</a></div>  
</section>


<?php
$content = ob_get_clean();
require 'layoutDashboard.php';
?>   