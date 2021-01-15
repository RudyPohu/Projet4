<?php $title = "Liste des commentaires signalés"; ?>
<?php ob_start(); ?>
 
<div>
    <h2 class="titre1">Liste des commentaires signalés :</h2>    
</div>

<section class="comments">
    <?php
    foreach($comments as $comment):
    ?>

    <div class="comment">
        <p>Numéro du chapitre: <?php echo ($comment->id_ticket()); ?></p>
        <p>Auteur: <?php echo htmlspecialchars($comment->auteur()); ?></p>
        <p>Date de publication : <?php echo ($comment->getDate()); ?></p>   
        <p>Commentaire: <?php echo nl2br(htmlspecialchars($comment->commentaire())); ?></p>
    
        <div class="buttonsdash ajustbuttonsdash">
            <div class="button ajutbutton"> <a href="index.php?action=unreport&id=<?= $comment->id() ?>">Valider</a></div>
            <div class="button ajutbutton"> <a onclick="return confirm('Etes vous sur de vouloir supprimer ce commentaire ?')" href="index.php?action=deleteReport&id=<?= $comment->id() ?> ">Supprimer</a></div>        
        </div>
    </div>

    <?php
    endforeach;
    ?>
</section>
    
<div id="retour" class="button"> <a href="index.php?action=dashboard" title="aller à la page connexion">Revenir au tableau de bord</a></div>
 
<?php
$content = ob_get_clean();
require 'layoutDashboard.php';
?>   