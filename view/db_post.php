<?php $title = "dashboard"; ?>
<?php ob_start(); ?>
 
<div>
    <h2 class="titre1">Liste des chapitres :</h2>        
</div>

<section>

    <?php
    foreach($tickets as $ticket):
        $content = preg_replace('#<script(.*?)>(.*?)</script>#is', '',$ticket->contenu());
    ?>
    
        <div class="ticket">     
            <h2>
                <?php echo htmlspecialchars($ticket->titre()); ?>
                <em>le <?php echo $ticket->getDate(); ?></em>
            </h2> 
            <p>
                <?php echo $content; ?>
            </p> 
            
            <div class="buttonsdash">
                <div class="button"> <a href="index.php?action=updatePost&ticket_id=<?php echo $ticket->id(); ?> ">Modifier ce chapitre</a></div>
                <div class="button"> <a href="index.php?action=deletePost&ticket_id=<?php echo $ticket->id(); ?> ">Supprimer ce chapitre</a></div>
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