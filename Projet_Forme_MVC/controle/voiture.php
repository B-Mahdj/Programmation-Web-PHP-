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
            
            /*Traiter future image*/
            $photo = $_FILES["photo"]["name"];
            $chemin = "images/".basename($photo);
            
            /*SI tout s est bien passé*/
            
            ajouter_voitureBD($type, $json, $photo, $chemin);
            
            unset($_FILES);
        }
        
    }
    
    
}

    
    

?>