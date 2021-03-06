<?php $title = "Chapitres du livre"; ?>
<?php ob_start(); ?>


<div class="sliderroman">
    <h1 class="titre1">"Billet simple pour l'Alaska"</h1>
</div>

    <?php
    foreach($tickets as $ticket):
        $content = preg_replace('#<script(.*?)>(.*?)</script>#is', '',$ticket->contenu());
    ?>
    
    <div class="ticket">
        <h2>
            <?php echo htmlspecialchars($ticket->titre()); ?>
            <br /><em>Publié le <?php echo $ticket->getDate(); ?></em>
        </h2> 
        
            <?php 
            if(strlen($content) > 200) {
                echo substr ($content, 0, 400);
                ?> <p>[...]</p>
                <?php
            } else {
                echo $content; 
            }
            ?>

        <div class="button"><a href="index.php?action=viewComments&ticket_id=<?php echo $ticket->id(); ?>">Lire la suite</a></div>
    </div>

    <?php
    endforeach;
    ?>


<?php
$content = ob_get_clean();
require 'layout.php';
?>