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
    require_once("controle/voiture.php");
    $ligne = afficher_voiture();
    $taille = sizeof($ligne);
    $i = 0;
?>
    
<div class = "caracteristiques">
<?php
    while($i<$taille){
        /*Afficher caractéristiques*/
        echo $ligne[$i]['type']. " ";
        if(!is_null($ligne[$i]['caract'])){
            $caract = json_decode($ligne[$i]['caract']);
        if(!empty($caract->{'moteur'})){
            echo $caract->{'moteur'}. " ";
        }
        if(!empty($caract->{'vitesse'})){
            echo $caract->{'vitesse'}. " ";
        }
        if(!empty($caract->{'places'})){
            echo $caract->{'places'};
        }
        }
        /*Afficher Image*/
        echo "<img src='images/".$ligne[$i]['photo']."' >";
        echo "
            <a href='index.php?controle=voiture&action=suppression_voiture&param1=$i'><img class ='delete' src='vue/icons/delete.svg'/></a>";
        $i++;
     }
?>
    
</div>
    
<br>
    
<a href="index.php?controle=voiture&action=ajouter_voiture">Ajout Voiture</a><br/>
<a href="index.php?controle=entreprise&action=affichage_locations">Affichage Locations Entreprises</a>

</div>
    
</body>

</html>
