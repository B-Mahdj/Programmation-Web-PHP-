<?php

function ajouter_voitureBD($type, $photo, $json){
    require("modele/connectSQL.php");
    
    $req = $pdo->prepare('INSERT INTO vehicule (type, caract, location, photo) VALUES(:type, :caract, :location, :photo)');
    $req->execute(array(
        'type' => $type,
        'caract' => $json,
        'location' => "disponible", //etat de base d'une voiture enregistrée
        'photo' => $photo
    ));

}
    
    
?>