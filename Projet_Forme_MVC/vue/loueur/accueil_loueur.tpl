<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Affichage Voiture</title>
  <link rel="stylesheet" href="./vue/styleCSS/style_accueil_loueur.css">
</head>

<body>
<div class = "formulaire">
<h3>Affichage Voiture</h3>
    
<?php
    require("controle/voiture.php");
    $ligne = afficher_voiture();
    $taille = sizeof($ligne);
    $i = 0;
?>
    
<div class = "caracteristiques">
<?php
    while($i<$taille){
        /*Afficher caractéristiques*/
        $caract = json_decode($ligne[$i]['caract']);
        echo $ligne[$i]['type']. " ".$ligne[$i]['location']. " ".$caract->{'moteur'}. " ".$caract->{'vitesse'}. " ".$caract->{'places'};
        /*Afficher Image*/
        echo "<img src='images/".$ligne[$i]['photo']."' >";
        $i++;
        echo "
            <a href='index.php?controle=voiture&action=suppression_voiture&param1=$i'><img class ='delete' src='vue/icons/delete.svg'/></a>";
     }

?>
    
</div>
    
    <br>
    
<a href="index.php?controle=voiture&action=ajouter_voiture">Ajout Voiture</a>

</div>
    
</body>

</html>
