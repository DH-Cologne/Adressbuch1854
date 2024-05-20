<?php

/*Adressbuch digitale*/

//on récupère le fichier json qui contient les chemins
$file = '../download/images.json';

//on récupère ce qu'il contient
$data = file_get_contents($file);

//on décode le json pour obtenir un array exploitable
$obj = json_decode($data, true);

//on donne la direction des scans pour l'affichage
$directory = '../scans/SD/';
$directory2 = '../scans/HD/';

?>
<!-- on importe la feuille de style -->
<link rel="stylesheet" type="text/css" href="../css/slider.css">
<div class="container3">
<?php
// on créé une div pour la galerie
echo "<div class='slideshow-container'>";

//pour chaque image on va créer une balise image avec une div de text pour le nom de l'image
foreach ($obj as $key => $values){

  echo "<div class='mySlides fade'>
        <a target='blank' href='".$directory2.$values['image'].".jpg'><img src='".$directory.$values['image'].".jpg' alt='".$values['alt']."' style='width:100%'></a>
        <div style='text-align:center; background-color:lightgrey; border-radius:10px; padding:5px;margin:5px'>
        Dateiname: ".$values['alt']."<br>
        Format: JPEG <br>
        Auflösung: 300dpi <br>
        Größe: ".$values['taille']."
        </div>
        </div>
       
        ";}

// on met en place les boutons suivant et précédent puis on ferme les div
echo   "<div style='display:flex; justify-content:center; align-items:center'>
        <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>";
       

// Possibilité de mettre en place des boutons égal au nombre de pages du Adressbuch
echo "<div class='marquepage'>";

foreach ($obj as $key => $values){

  echo  "<p class='dot' onclick='currentSlide(".$values['id'].")'>".$values['image']."</p>";
 }

echo " </div>
        <a class='next' onclick='plusSlides(1)'>&#10095;</a>
        </div>
        </div>"; ?>
</div>
 <script>

  //on met en place le display pour chaque image avec une boucle for
      var slideIndex = 1;
      showSlides(slideIndex);
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if(n > slides.length) {
          slideIndex = 1
        }
        if(n < 1) {
          slideIndex = slides.length
        }
        for(i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for(i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }
    </script>
