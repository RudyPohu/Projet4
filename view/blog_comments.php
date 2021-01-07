<?php $title = "Commentaires"; ?>
<?php ob_start(); ?>

<!-- le titre -->   
    	 
<div class="sliderroman">
    <h1 class="titre1">"Billet simple pour l'Alaska"</h1>
</div>

<!-- visualisation du ticket -->
<div class="ticket ticketcomment">
    <h2>
        <?php echo htmlspecialchars($ticket->titre()); ?>
        </br><em>Publié le <?php echo $ticket->getDate(); ?></em>
    </h2>

    <p>
    <?php echo nl2br(htmlspecialchars($ticket->contenu())); ?>
    </p>
</div>

<h2>Commentaires des lecteurs:</h2>

	<section class="comments">
		
		<?php
		foreach($comments as $comment):
		?>

		<div class="comment">
			<div class="">
				<p><strong><?php echo htmlspecialchars($comment->auteur()); ?></strong> le <?php echo ($comment->getDate()); ?></p>
				<?php if ($comment->reported()) {
					?> 
					<p style="color: red"><?php echo "Ce commentaire a été signalé"; ?></p>
					<?php 
				}
				else {
				?>	
					<p><?php echo nl2br(htmlspecialchars($comment->commentaire())); ?></p>
				<div class="">
					<form action='index.php?action=storeReported' method='POST'>
						<p>
							<input type="hidden" name="id" value="<?= $comment->id() ?>">
							<input type="hidden" name="id_ticket" value="<?= $ticket->id() ?>">
							<input class="reported" type='submit' value='Signaler ce commentaire'>
						</p>
					</form>
				</div>


				<?php
				}
				?>
				
			</div>

			<?php
			endforeach;
			?>
		</div>
	</section>

 		<!-- formulaire pour laisser un commentaire -->
	<div class="formulaire">
		<h2>Laisser vous aussi votre commentaire :</h2>

		<form action="index.php?action=storeComment" method="post" >
			<?php
			if(isset($_SESSION['errors'])) {
				echo $_SESSION['errors'];
				unset($_SESSION['errors']);
			}
			?>
	        <p>
		        <label for="auteur">Votre pseudo:</label> : <br />
		        <input class="pseudo" type="text" name="auteur" /><br /><br />
		        <label for="commentaire">Votre message:</label> : <br />
		        <textarea class="texte" name="commentaire" rows="6" cols="25"></textarea><br />
		        <input type="hidden" name="id_ticket" value="<?php echo $ticket->id(); ?>" /><br />

		        <input class="button buttonform" type="submit" value="Envoyer" />
			</p>
   		</form> 
   	</div> 

<!-- 		<button class="button"><a href="index.php" >Retour à la page d'accueil</a></button>
 -->
	

<?php
$content = ob_get_clean();
require 'layout.php';
?>