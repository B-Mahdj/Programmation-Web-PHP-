<?php 
	/* Fonctions-modèle réalisant les requetes de gestion des entreprises en base de données */

function inscriptionBD($nom, $mdp, $email){
    
    require("modele/connectSQL.php");
    
    if(!verif_ident($nom,$pdo)){
    $req = $pdo->prepare('INSERT INTO entreprise (nom, mdp, email) VALUES(:nom, :mdp, :email)');
    $req->execute(array(
        'nom' => $nom,
        'mdp' => $mdp,
        'email' => $email
    ));
    }
    else{
        echo 'Cet utilisateur existe deja'; 
    }
}

function connexionBD($nom, $mdp){
    
    require("modele/connectSQL.php");
    
    if(!verif_ident($nom,$pdo)){
        return false;
    }
    $mdp_sha1 = sha1($mdp);
            
    $sql = "SELECT mdp FROM entreprise WHERE nom=:nom";
    $stm = $pdo->prepare($sql);
    $stm ->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stm->execute();
    $mdp_bd = $stm->fetch();
            
    if($mdp_sha1==$mdp_bd["mdp"]){
        return true;
    }
    else{
        return false;
    }
}


function verif_ident($nom, $pdo){
    
    $stm = $pdo->prepare("SELECT * FROM entreprise WHERE nom=?");
    $stm->execute([$nom]);
    $b = $stm->fetch();
    if($b) { //nom existe
        return true;
    }
    else {
        return false;
    }
}

function connexionBDLoueur($nom, $mdp){
    require("modele/connectSQL.php");
    
    $mdp_sha1 = sha1($mdp);
            
    $sql = "SELECT mdp FROM entreprise WHERE nom=:nom";
    $stm = $pdo->prepare($sql);
    $stm ->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stm->execute();
    $mdp_bd = $stm->fetch();
            
    if($mdp_sha1==$mdp_bd["mdp"]){
        return true;
    }
    else{
        return false;
    }
}

function getIdbyNameBd($nom){
    require("modele/connectSQL.php");
    $sql = "SELECT id FROM entreprise WHERE nom=:nom";
    $stm = $pdo->prepare($sql);
    $stm ->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stm->execute();
    $id = $stm->fetch();
    return $id['id'];
}

function liste_entrepriseBD(){
    require("modele/connectSQL.php");
    $sql = "SELECT * FROM entreprise";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $liste = $stm->fetchAll();
    return $liste;
}

?>