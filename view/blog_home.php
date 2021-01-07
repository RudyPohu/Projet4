<?php $title = "Index"; ?>
<?php ob_start(); ?>

<!-- le titre -->   
    <div class="sliderhome">
        <h1 class="titre1">Bienvenue sur le blog<br /> de Jean Forteroche</h1>
        <h2 class="titre2">"Billet simple pour l'Alaska"<br />Mon nouveau roman est en ligne</h2>
        <div class="button"><a  href="#ancresynopsis">Lire le synopsis</a></div>

    </div>

    <section id="ancresynopsis" class="homesection1">
            <div>
                <img  class="imagejean" src="../public/images/imagejean.jpg" alt="roman billet simple pour l'alaska" />
            </div>
            <div class="textsection">
                <h2>"Billet simple pour l'Alaska"<br />SYNOPSIS:</h2>
               
                <p>Il avait renoncé au rêve américain. Pour vivre une aventure extrême. En 1992, le cadavre d'un jeune homme est découvert dans un bus abandonné en Alaska, au pied du mont Mckinley, loin de tout lieu habité.

                Fils de bonne famille, Chris McCandless aurait dû en toute logique devenir un américain bien tranquille à l'avenir sans surprise. Mais, dès l'obtention de son diplôme universitaire, il décide de partir à l'aventure.

                Après avoir fait don de ses économies à une œuvre humanitaire, il entame son périple sous un nom d'emprunt avec sa vieille voiture, qu'il abandonnera un peu plus tard. Il sillonne le sud des Etats-Unis, subsistant grâce à de menus travaux, avant de réaliser son grand projet: s'installer au cœur de l'Alaska, seul, en communion avec la nature. Mais on ne s'improvise pas trappeur, ni homme des bois... </p>

                <p><b>J'ai décidé de transposer mon nouveau récit en ligne, sous la forme de chapitres périodiques et interactifs, afin d'établir une communication bilatérale avec mes lecteurs qu'empêche le support papier.</b></p>
            
                <div class="button"><a href="index.php?action=book">Accéder aux chapitres</a></div>
            </div>
        </section>   
      
 <!-- les articles de blog -->
        <section class="homesection2">
            <h2>Dans la même thématique, je vous propose de découvrir</h2>

             <div class= "livresection">
                <img class="livre" src="../public/images/livre1.jpg" alt="roman 1">
                <img class="livre" src="../public/images/livre2.jpg" alt="roman 2">
                <img class="livre" src="../public/images/livre3.png" alt="roman 3">
                <img class="livre" src="../public/images/livre4.jpg" alt="roman 4">

            </div>
        </section>

       
<?php
$content = ob_get_clean();
require 'layout.php';
?>
