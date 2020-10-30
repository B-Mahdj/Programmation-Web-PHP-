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
        if(empty($photo)){
            echo 'Veuillez fournir une photo'; $validite = false;
        }
        
        if($validite == true){
            $photo = $_POST['photo'];
           /*Traiter le JSON SI un des 3 initialisé*/ 
            if(!is_null($energie)||!is_null($vitesse)||!is_null($nb_place)){
                
                /*Créer l'array a coder en JSON*/
                $tableau = array();
                
                if(!is_null($energie)){
                    $tableau_moteur = array("moteur"=>$energie);
                    $tableau = $tableau + $tableau_moteur;
                }
                if(!is_null($vitesse)){
                    $tableau_vitesse = array("vitesse"=>$vitesse);
                    $tableau = $tableau + $tableau_vitesse;
                }
                if(!is_null($nb_place)){
                    $tableau_place = array("places"=>$nb_place);
                    $tableau = $tableau + $tableau_place;
                }
                /*Coder l'array en JSON*/
                $json = json_encode($tableau);
            }
            
            /*Traiter future image*/
            
            
            /*SI tout s est bien passé*/
            ajouter_voitureBD($type, $photo, $json);
        }
        
    }
    
    
}

    
    

?>