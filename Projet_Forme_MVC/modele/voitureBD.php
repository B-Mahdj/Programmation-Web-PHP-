<?php

function ajouter_voitureBD($type, $json, $photo){
    require("modele/connectSQL.php");

    if(empty($json)){
        $req = $pdo->prepare('INSERT INTO vehicule (type, location, photo) VALUES(:type, :location, :photo)');
        $req->execute(array(
        'type' => $type,
        'location' => "disponible", //etat de base d'une voiture enregistrée
        'photo' => $photo
    ));
    }
    else{
        $req = $pdo->prepare('INSERT INTO vehicule (type, caract, location, photo) VALUES(:type, :caract, :location, :photo)');
        $req->execute(array(
        'type' => $type,
        'caract' => $json,
        'location' => "disponible", //etat de base d'une voiture enregistrée
        'photo' => $photo
    ));
    }
    
}
    
    
?>