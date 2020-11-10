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

function fetch_voitureBD(){
    require("modele/connectSQL.php");
    
    $sql = "SELECT * FROM vehicule";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $ligne = $stm->fetchAll();
    return $ligne;
}

function fetch_voitureBD_dispo(){
    require("modele/connectSQL.php");
    
    $sql = "SELECT * FROM vehicule WHERE location='disponible'";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $ligne = $stm->fetchAll();
    return $ligne;
}

function suppression_voitureBD($id){
    require("modele/connectSQL.php");
    
    $sql = "DELETE FROM vehicule WHERE id=$id";
    $stm = $pdo->prepare($sql);
    $stm->execute();
}

function reservation_voitureBD($id_v, $id_e, $datedebut, $datefin, $valeur){
    require("modele/connectSQL.php");
    $req = $pdo->prepare('INSERT INTO facturation (ide, idv, dateD, dateF, valeur, etat) VALUES(:ide, :idv, :dateD, :dateF, :valeur, :etat)');
        $req->execute(array(
        'ide' => $id_e,
        'idv' => $id_v,
        'dateD' => $datedebut, 
        'dateF' => $datefin,
        'valeur' => $valeur,
        'etat' => 1 
    ));
        $req = $pdo->prepare('UPDATE VEHICULE SET location=:ide WHERE ID=:id_v');
        $req->execute(array(
        'ide' => $id_e,
        'id_v' => $id_v
    ));
}
    
    
?>