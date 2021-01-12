<?php $title = "Tableau de bord"; ?>
<?php ob_start(); ?>

       
<section class="sectionadmin">
    <h2 class="titreadmin">Que voulez-vous faire aujourd'hui ?</h2>
    
    <div class="menuadmin">
        <div class="buttonadmin"> <a href="index.php?action=listPosts ">Accéder aux chapitres</a></div>
        <div class="buttonadmin"> <a href="index.php?action=listComments ">Accéder aux commentaires signalés</a></div>
    </div>

    <div class="menuadmin">
        <div class="buttonadmin"> <a href="index.php?action=newPost ">Ajouter un nouveau chapitre</a></div>
        <div class="buttonadmin"> <a href="index.php?action=deconnexion ">Me déconnecter</a></div>
    </div>
</section>
    

 
<?php
$content = ob_get_clean();
require 'layoutDashboard.php';
?>   