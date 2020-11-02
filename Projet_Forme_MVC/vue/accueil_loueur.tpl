<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Affichage Voiture</title>
  <link rel="stylesheet" href="">
</head>

<body>
<div class = "formulaire">
<h3>Affichage Voiture</h3>
    
<?php

    require("controle/voiture.php");
    $ligne = afficher_voiture();
    $taille = sizeof($ligne);
    $i = 0;
    while($i<$taille){
        /*Afficher caractéristiques*/
        $caract = json_decode($ligne[$i]['caract']);
        echo $ligne[$i]['type']. " ".$ligne[$i]['location']. " ".$caract->{'moteur'}. " ".$caract->{'vitesse'}. " ".$caract->{'places'};
        /*Afficher Image*/
        echo "<img src='images/".$ligne[$i]['photo']."' >";
        $i++;
    }

?>
    
<a href="index.php?controle=voiture&action=ajouter_voiture">Ajout Voiture</a>

</div>
    
</body>

</html>
