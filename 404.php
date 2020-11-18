<?php include 'header.php' ?>

  <body>
  	
  	<h2 style="
       display: block;
       margin: auto;
       vertical-align: center;
    " >
    LA PAGE RECHERCHEE N'A PU ETRE TROUVE <br>
<script type="text/javascript">
// initialise le temps
var cpt = 3;
 
timer = setInterval(function(){
    if(cpt>0) // si on a pas encore atteint la fin
    {
        --cpt; // décrémente le compteur
        var chrono = document.getElementById("chrono"); // récupère l'id
        var old_contenu = chrono.firstChild; // stock l'ancien contenu
        chrono.removeChild(old_contenu); // supprime le contenu
        var texte = document.createTextNode(cpt); // crée le texte
        chrono.appendChild(texte); // l'affiche
    }
    else // sinon brise la boucle
    {
      document.location.href="index.php"
    }
}, 1000);
 
</script>
 
<!-- le div ou on affiche le chrono, ne pas le mettre vide -->
Vous allez etre redirigé dans <span id="chrono">3</span> secondes.
</h2>
</body>