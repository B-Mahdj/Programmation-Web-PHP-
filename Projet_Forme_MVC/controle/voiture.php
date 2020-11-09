<?php 
function ajouter_voiture(){
    require("vue/voiture/inscription_voiture.tpl");
    
    if((sizeof($_POST)) > 0){
        require("modele/voitureBD.php");
        $validite = true;
        $type = $_POST['type'];
        $energie = $_POST['energie'];
        $vitesse = $_POST['vitesse'];
        $nb_place = $_POST['nb_place'];
        
        //Données initialisées
        if(empty($type)){
            echo 'Veuillez rentrer un type'; $validite = false;
        }  
        if(empty($_FILES['photo']['name'])){
            echo 'Veuillez fournir une photo'; $validite = false;
        }
        if($_FILES['photo']['error'] != 0){ /*Erreur lors de l'upload*/
            if($_FILES['photo']['error'] == 1){
                /*Une valeur erreur de 1 stipule que le fichier est trop grand par rapport a la taille fixee par le fichier php.ini*/
                echo"Votre fichier est trop grand";$validite = false;  
            }
            else{
                echo "Il y a eu une erreur lors de l'upload de votre image";$validite = false;   
            }
        }
        else{
            /*Donnees valides*/
            $photo = $_FILES["photo"]["name"];
            $ext = explode('.', $photo);
            $extension_image = strtolower(end($ext));

            if($extension_image != "jpg" && $extension_image != "png" && $extension_image != "jpeg") {
                echo "Seulement les images au format jpg, png et jpeg sont autorisees";$validite = false;
            }
            else{
                $chemin = "images/".basename($photo);
                if(!move_uploaded_file($_FILES["photo"]["tmp_name"], $chemin)){
                    echo"Upload image echoué";$validite = false;
                }
                }
            }
        
        
        if($validite == true){
           /*Traiter le JSON SI un des 3 initialisé*/ 
            
            $json = null;
            if(!empty($energie)||!empty($vitesse)||!empty($nb_place)){
                
                /*Créer l'array a coder en JSON*/
                $tableau = array();
                
                if(!empty($energie)){
                    $tableau_moteur = array("moteur"=>$energie);
                    $tableau = $tableau + $tableau_moteur;
                }
                if(!empty($vitesse)){
                    $tableau_vitesse = array("vitesse"=>$vitesse);
                    $tableau = $tableau + $tableau_vitesse;
                }
                if(!empty($nb_place)){
                    $tableau_place = array("places"=>$nb_place);
                    $tableau = $tableau + $tableau_place;
                }
                /*Coder l'array en JSON*/
                $json = json_encode($tableau);
            }
            
            ajouter_voitureBD($type, $json, $photo);
        }
    }
}

function afficher_voiture(){
    require("modele/voitureBD.php");
    
    $ligne = fetch_voitureBD();
    return $ligne;
}

function afficher_voiture_dispo(){
    require("modele/voitureBD.php");
    
    $ligne = fetch_voitureBD_dispo();
    return $ligne;
}

function suppression_voiture($index){
    $ligne = afficher_voiture();
    $id_a_supp = $ligne[$index]['ID'];
    suppression_voitureBD($id_a_supp);
    
    /*On recharge la dernière page*/
    $nexturl = "index.php?controle=entreprise&action=accueil_loueur";
    header("Location:" . $nexturl);
}

function reservation_voiture($index){
    $ligne = afficher_voiture_dispo();
    $id_voiture = $ligne[$index]['ID'];
    
    /*Récupérer l'id de l'entreprise via $_SESSION*/
    require("controle/entreprise.php");
    $id_entreprise = getIdbyName($_SESSION['profil']);
    
    
    require("vue/voiture/reservation_voiture.tpl");
    /*Vue qui permet de rentrer la date debut et fin de la locationpar la personne*/
    if((sizeof($_POST)) > 0){
        if(empty($datedebut) || empty($datefin) || empty($valeur)){
        echo "Veuillez remplir tous les champs";
    }
    else{
        /*La valeur a payer sera de (30*nbjours ?) */
        reservation_voitureBD($id_voiture, $id_entreprise, $datedebut, $datefin, $valeur);   
    }
    }
}
    

?>